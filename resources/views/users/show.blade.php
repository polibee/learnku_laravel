@extends('layouts.default')
@section('title', $user->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <div class="md:col-span-4">
            <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
                <div class="text-center">
                    <img src="{{ $user->gravatar() }}" 
                         alt="{{ $user->name }}" 
                         class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-white shadow-lg">
                    <h2 class="mt-4 text-xl font-bold text-gray-900">{{ $user->name }}</h2>
                </div>
            </div>
        </div>

        <div class="md:col-span-8">
            <section class="bg-white rounded-lg shadow-sm">
                @if ($statuses->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach ($statuses as $status)
                            @include('statuses._status')
                        @endforeach
                    </div>
                    
                    <div class="p-4 bg-gray-50 border-t border-gray-200">
                        {{ $statuses->links() }}
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">暂无微博</p>
                @endif
            </section>
        </div>
    </div>
</div>
@stop