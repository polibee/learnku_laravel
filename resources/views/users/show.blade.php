@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 md:ml-2/12">
      <section class="user_info">
        @include('shared._user_info', ['user' => $user])
      </section>
      <section class="status">
        @if ($statuses->count()>0)
        <ul class="list-unstyled">
        @foreach ($statuses as $status)
        @include('statuses._status')
        @endforeach
        </ul>
        
          <div class="mt-6">
            {{ $statuses->links() }}
          </div>
          @else
          <p>没有数据</p>
          @endif
      </section>
    </div>
  </div>
@stop