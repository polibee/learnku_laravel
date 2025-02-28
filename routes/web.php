<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StatusesController;  // 添加这行
use App\Http\Controllers\PasswordController;  // 添加这行

// 修改路由写法，使用完整的类名引用
Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('help', [StaticPagesController::class, 'help'])->name('help');
Route::get('about', [StaticPagesController::class, 'about'])->name('about');
Route::get('signup', [UsersController::class, 'create'])->name('signup')->middleware('guest');
Route::resource('users', UsersController::class)->middleware('auth')->except(['show', 'create', 'store','index']);
Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');

// 添加用户列表路由
Route::get('/users', [UsersController::class, 'index'])->name('users.index');

Route::get('login', [SessionsController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->name('login');
Route::delete('logout',[SessionsController::class,'destory'])->name('logout');
// 对密码重置路由添加限流
Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail'])
    ->middleware('throttle:password-resets')
    ->name('password.email');

// 修正微博资源路由的语法
Route::resource('statuses', StatusesController::class)->middleware('auth')->only(['store', 'destroy']);
Route::get('/users/{user}/followings',[UsersController::class,'followings'])->name('users.followings');
Route::get('users/{user}/followers',[UsersController::class,'followers'])->name('users.followers');