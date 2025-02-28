<div class="flex flex-col items-center">
    <a href="{{ route('users.show', $user->id) }}">
        <img src="{{ $user->gravatar('100') }}" 
             alt="{{ $user->name }}" 
             class="w-16 h-16 rounded-full object-cover">
    </a>
    <h1 class="mt-2 text-xl font-semibold text-gray-900">
        {{ $user->name }}
    </h1>
</div>