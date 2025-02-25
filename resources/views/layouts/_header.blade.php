<header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-3 shadow-sm">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between">
      <a class="flex-none font-semibold text-xl text-black hover:text-gray-600 transition" href="{{ route('home') }}">Weibo App</a>
      
      <div class="flex flex-row items-center gap-5 mt-5 sm:justify-end sm:mt-0 sm:ps-5">
        @if (Auth::check())
          <a class="font-medium text-gray-600 hover:text-gray-900 transition" href="#">用户列表</a>
          
          <div class="relative group">
            <button class="flex items-center font-medium text-gray-600 hover:text-gray-900 transition">
              {{ Auth::user()->name }}
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            
            <div class="invisible group-hover:visible opacity-0 group-hover:opacity-100 absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 transition-all duration-200">
              <a href="{{ route('users.show', Auth::user()) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">个人中心</a>
              <a href="{{ route('users.edit', Auth::user()) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">编辑资料</a>
              <div class="border-t border-gray-100"></div>
              <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full text-left text-sm text-red-600 hover:text-red-700">退出</button>
              </form>
            </div>
          </div>
        @else
          <a class="font-medium text-gray-600 hover:text-gray-900 transition" href="{{ route('help') }}">帮助</a>
          <a class="font-medium text-gray-600 hover:text-gray-900 transition" href="{{ route('login') }}">登录</a>
          <a class="font-medium text-gray-600 hover:text-gray-900 transition" href="{{ route('about') }}">关于</a>
        @endif
      </div>
    </nav>
</header>

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
@endpush