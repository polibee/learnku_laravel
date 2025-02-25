@extends('layouts.default')
@section('title', '更新个人资料')

@section('content')
<div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
  <div class="w-full max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
    <div class="mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">更新个人资料</h2>
    </div>

    @include('shared._errors')

    <div class="mb-6 flex justify-center">
      <a href="http://gravatar.com/emails" target="_blank" class="inline-block hover:opacity-80 transition">
        <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="rounded-full w-32 h-32"/>
      </a>
    </div>

    <form method="POST" action="{{ route('users.update', $user->id )}}" class="space-y-6">
      @method('PATCH')
      @csrf

      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">名称：</label>
        <input type="text" name="name" id="name" 
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
               value="{{ $user->name }}">
      </div>

      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">邮箱：</label>
        <input type="text" name="email" id="email" 
               class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed" 
               value="{{ $user->email }}" disabled>
      </div>

      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">密码：</label>
        <input type="password" name="password" id="password" 
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
               placeholder="如不修改密码请留空">
      </div>

      <div>
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">确认密码：</label>
        <input type="password" name="password_confirmation" id="password_confirmation" 
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
               placeholder="如不修改密码请留空">
      </div>

      <div class="flex justify-center">
        <button type="submit" 
                class="px-6 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-200">
          更新
        </button>
      </div>
    </form>
  </div>
</div>
@stop