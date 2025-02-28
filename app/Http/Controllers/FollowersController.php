<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FollowersController extends Controller
{
    use AuthorizesRequests;
    
    // 移除构造函数中的中间件设置
    // 或者修改为以下方式
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    
    public function store(User $user)
    {
        $this->authorize('follow', $user);
        if (!Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }
        return redirect()->route('users.show', $user->id);
    }
    
    public function destroy(User $user)
    {
        $this->authorize('follow', $user);
        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }
        return redirect()->route('users.show', $user->id);
    }
}
