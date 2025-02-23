@extends('layouts.default')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
  <div class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-md">
      <h1 class="text-4xl font-bold text-gray-900 mb-6 text-center">Hello Laravel</h1>
      <div class="space-y-6">
        <p class="text-lg text-gray-700 leading-relaxed">
          你现在所看到的是 <a class="text-blue-600 hover:text-blue-800 underline" href="https://learnku.com/courses/laravel-essential-training">Laravel 入门教程</a> 的示例项目主页。
        </p>
        <p class="text-lg text-gray-700 leading-relaxed">
          一切，将从这里开始。
        </p>
        <div class="mt-8 flex justify-center">
          <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1" href="#" role="button">
            现在注册
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop