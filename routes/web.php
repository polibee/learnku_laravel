<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionsController;
// 修改路由写法，使用完整的类名引用
Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('help', [StaticPagesController::class, 'help'])->name('help');
Route::get('about', [StaticPagesController::class, 'about'])->name('about');
Route::get('signup', [UsersController::class, 'create'])->name('signup');
Route::resource('users', UsersController::class);
Route::get('login',[SessionsController::class,'create'])->name('login');
Route::post('login',[SessionsController::class,'store'])->name('login');
Route::delete('logout',[SessionsController::class,'destory'])->name('logout');

