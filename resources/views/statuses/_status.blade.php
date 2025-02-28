<li class="flex space-x-4 py-4 px-6 hover:bg-gray-50">
    <div class="flex-shrink-0">
        <a href="{{ route('users.show', $user->id) }}">
            <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
        </a>
    </div>
    
    <div class="flex-grow">
        <div class="flex items-baseline justify-between">
            <div>
                <a href="{{ route('users.show', $user->id) }}" class="font-medium text-gray-900">{{ $user->name }}</a>
                <span class="text-sm text-gray-500 ml-2">{{ $status->created_at->diffForHumans() }}</span>
            </div>
            @can('destroy', $status)
                <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('确定要删除这条微博吗？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            @endcan
        </div>
        
        <div class="mt-2 text-gray-700">{{ $status->content }}</div>

        @if($status->content)
            <!-- 评论区域 -->
            <div class="mt-4">
                @if(Auth::check())
                    <form action="{{ route('statuses.comments.store', $status->id) }}" method="POST" class="mb-4">
                        @csrf
                        <div class="flex">
                            <input type="text" 
                                   name="content" 
                                   class="flex-1 border border-gray-300 rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   placeholder="发表评论...">
                            <button type="submit" 
                                    class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                评论
                            </button>
                        </div>
                    </form>
                @endif

                @if($status->comments()->count() > 0)
                    <div class="space-y-3">
                        @foreach($status->comments()->with('user')->get() as $comment)
                            <div class="flex items-start space-x-3 bg-gray-50 rounded-lg p-3">
                                <img src="{{ $comment->user->gravatar('40') }}" 
                                     alt="{{ $comment->user->name }}" 
                                     class="w-8 h-8 rounded-full">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-sm text-gray-900">{{ $comment->user->name }}</span>
                                        <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-700">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    </div>
</li>