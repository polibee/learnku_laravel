<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;

// 修改路由写法，使用完整的类名引用
Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('help', [StaticPagesController::class, 'help'])->name('help');
Route::get('about', [StaticPagesController::class, 'about'])->name('about');
Route::get('signup', [UsersController::class, 'create'])->name('signup');
Route::resource('users', UsersController::class);