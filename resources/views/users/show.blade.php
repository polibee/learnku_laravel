@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 md:ml-2/12">
      <section class="user_info">
        @include('shared._user_info', ['user' => $user])
      </section>
    </div>
  </div>
@stop