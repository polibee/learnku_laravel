@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
  <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">所有用户</h2>
  
  <div class="bg-white rounded-lg shadow overflow-hidden">
    @foreach ($users as $user)
        @include('users._user', ['user' => $user])
    @endforeach
  </div>

  <div class="mt-6">
    {{ $users->links() }}
  </div>
</div>
@stop