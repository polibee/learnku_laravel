<div class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition border-b border-gray-200 last:border-b-0">
  <div class="flex items-center">
    <img class="h-8 w-8 rounded-full object-cover" 
         src="{{ $user->gravatar() }}" 
         alt="{{ $user->name }}">
    <a href="{{ route('users.show', $user) }}" 
       class="ml-3 text-sm font-medium text-gray-900 hover:text-blue-600 transition">
      {{ $user->name }}
    </a>
  </div>

  @can('destroy', $user)
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" 
              class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
              onclick="return confirm('确定要删除这个用户吗？')">
        删除
      </button>
    </form>
  @endcan
<!-- 添加调试信息 -->
@if(Auth::check() && Auth::user()->is_admin)
    <!-- 当前用户是管理员 -->
@endif
</div>