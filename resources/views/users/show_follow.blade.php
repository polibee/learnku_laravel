@extends('layouts.default')
@section('title', $title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">{{ $title }}</h2>

  <div class="bg-white rounded-lg shadow-sm overflow-hidden">
    @if (count($users) > 0)
      <div class="divide-y divide-gray-200">
        @foreach ($users as $user)
          <div class="flex items-center p-4 hover:bg-gray-50">
            <img class="w-12 h-12 rounded-full object-cover mr-4" 
                 src="{{ $user->gravatar() }}" 
                 alt="{{ $user->name }}">
            <div>
              <a class="text-base font-medium text-gray-900 hover:text-blue-600" 
                 href="{{ route('users.show', $user) }}">
                {{ $user->name }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-gray-500 text-center py-8">暂无用户</p>
    @endif

    <div class="p-4 bg-gray-50 border-t border-gray-200">
      {{ $users->links() }}
    </div>
  </div>
</div>
@stop