<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;

// 修改路由写法，使用完整的类名引用
Route::get('/', [StaticPagesController::class, 'home']);
Route::get('help', [StaticPagesController::class, 'help']);
Route::get('about', [StaticPagesController::class, 'about']);
