@extends('layouts.default')
@section('content')
@if (Auth::check())
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <div class="md:col-span-8">
                <section class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    @include('shared._status_form')
                </section>
                
                <section class="bg-white rounded-lg shadow-sm">
                    <div class="divide-y divide-gray-200">
                        @if ($feed_items->count() > 0)
                            @foreach ($feed_items as $status)
                                @include('statuses._status', ['user' => $status->user])
                            @endforeach
                        @else
                            <p class="text-gray-500 text-center py-8">还没有微博！</p>
                        @endif
                    </div>
                    
                    <div class="p-4">
                        {!! $feed_items->render() !!}
                    </div>
                </section>
            </div>

            <aside class="md:col-span-4">
                <section class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
            </aside>
        </div>
    </div>
@else
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
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1" href="{{route('signup')}}" role="button">
                            现在注册
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@stop