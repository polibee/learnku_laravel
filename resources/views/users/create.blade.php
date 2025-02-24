@extends('layouts.default')
@section('title', '注册')

@section('content')
<div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
  <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    @include('shared._errors')
    <form class="space-y-6" action="{{ route('users.store') }}" method="POST">
      @csrf
      <h5 class="text-2xl font-medium text-gray-900 dark:text-white text-center mb-6">创建新账号</h5>
      
      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">用户名</label>
        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="请输入用户名" required />
      </div>

      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">邮箱地址</label>
        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@example.com" required />
      </div>

      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">密码</label>
        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="请输入密码" required />
      </div>

      <div>
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">确认密码</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="请再次输入密码" required />
      </div>

      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-200">立即注册</button>
      
      <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
        已有账号？<a href="#" class="text-blue-700 hover:underline dark:text-blue-500">立即登录</a>
      </div>
    </form>
  </div>
</div>
@stop