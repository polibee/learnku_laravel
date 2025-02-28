<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function show(User $user)
    {
        $statuses=$user->statuses()
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('users.show',compact('user','statuses'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
    
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        Auth::login($user);
    
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }
    public function edit(User $user)
    {
        if (! Gate::allows('update', $user)) {
            abort(403, '无权访问');
        }
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        
        $validated = $request->validate([
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $data = [];
        $data['name'] = $validated['name'];
        
        if ($validated['password']) {
            $data['password'] = bcrypt($validated['password']);
        }
        
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if ($file->isValid()) {
                // 生成文件名
                $filename = 'avatar_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // 直接移动文件到目标目录
                $file->move(storage_path('app/public/avatars'), $filename);
                
                // 更新数据
                $data['avatar'] = 'avatars/' . $filename;
                
                // 删除旧头像
                if ($user->avatar) {
                    @unlink(storage_path('app/public/' . $user->avatar));
                }
            }
        }
    
        $user->update($data);
        
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user);
    }
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
    // 添加关注列表方法
    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);
        $title = $user->name . '关注的人';
        return view('users.show_follow', compact('users', 'title'));
    }
    
    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $title = $user->name . '的粉丝';
        return view('users.show_follow', compact('users', 'title'));
    }
}
