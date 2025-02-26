@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
  <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">所有用户</h2>
  
  <div class="bg-white rounded-lg shadow overflow-hidden">
    @foreach ($users as $user)
      <div class="flex items-center px-6 py-4 hover:bg-gray-50 transition {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
        <img class="h-10 w-10 rounded-full object-cover" 
             src="{{ $user->gravatar() }}" 
             alt="{{ $user->name }}">
        <a href="{{ route('users.show', $user) }}" 
           class="ml-4 text-sm font-medium text-gray-900 hover:text-blue-600 transition">
          {{ $user->name }}
        </a>
      </div>
    @endforeach
  </div>

  <div class="mt-6">
    {{ $users->links() }}
  </div>
</div>
@stop