<li class="flex space-x-4 py-4">
    <a class="flex-shrink-0" href="{{ route('users.show', $user->id )}}">
        <img src="{{ $user->gravatar() }}" 
             alt="{{ $user->name }}" 
             class="w-12 h-12 rounded-full object-cover"
        />
    </a>
    <div class="flex-1 min-w-0">
        <div class="flex items-center space-x-2">
            <h5 class="text-base font-medium text-gray-900">{{ $user->name }}</h5>
            <span class="text-sm text-gray-500">/ {{ $status->created_at->diffForHumans() }}</span>
        </div>
        <p class="mt-1 text-gray-700 whitespace-pre-wrap break-words">
            {{ $status->content }}
        </p>
    </div>
</li>