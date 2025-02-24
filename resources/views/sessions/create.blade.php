@extends('layouts.default')
@section('title', '登录')

@section('content')
<div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
  <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    @include('shared._errors')
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
      @csrf
      <h5 class="text-2xl font-medium text-gray-900 dark:text-white text-center mb-6">登录</h5>
      
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">邮箱地址</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="请输入邮箱" required />
      </div>

      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">密码</label>
        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="请输入密码" required />
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
          <label for="remember" class="ml-2 text-sm font-medium text-gray-900">记住我</label>
        </div>
        <a href="#" class="text-sm text-blue-600 hover:underline">忘记密码？</a>
      </div>

      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-200">登录</button>
      
      <div class="text-sm font-medium text-gray-500 text-center">
        还没账号？<a href="{{ route('signup') }}" class="text-blue-600 hover:underline">现在注册</a>
      </div>
    </form>
  </div>
</div>
@stop