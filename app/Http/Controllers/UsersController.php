<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
        if (! Gate::allows('update', $user)) {
            abort(403, '无权访问');
        }
        $validated = $request->validate([    // 移除多余的 $request 参数
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'   // 改为 nullable，允许不修改密码
        ]);

        $data = [];
        $data['name'] = $validated['name'];
        
        if ($validated['password']) {
            $data['password'] = bcrypt($validated['password']);
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
}
