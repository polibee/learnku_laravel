<li class="flex space-x-4 py-4 px-6 hover:bg-gray-50">
    <a class="flex-shrink-0" href="{{ route('users.show', $user->id )}}">
        <img src="{{ $user->gravatar() }}" 
             alt="{{ $user->name }}" 
             class="w-12 h-12 rounded-full object-cover"
        />
    </a>
    <div class="flex-1 min-w-0">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <h5 class="text-base font-medium text-gray-900">{{ $user->name }}</h5>
                <span class="text-sm text-gray-500">/ {{ $status->created_at->diffForHumans() }}</span>
            </div>
            
            @can('destroy', $status)
                <form action="{{ route('statuses.destroy', $status->id) }}" 
                      method="POST" 
                      class="ml-4"
                      onsubmit="return confirm('确定要删除这条微博吗？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        删除
                    </button>
                </form>
            @endcan
        </div>
        <p class="mt-1 text-gray-700 whitespace-pre-wrap break-words">
            {{ $status->content }}
        </p>
    </div>
</li>