<div class="flex justify-around items-center py-4">
    <a href="#" class="text-center group">
        <div class="text-xl font-bold text-gray-900 group-hover:text-blue-600">
            {{ count($user->followings) }}
        </div>
        <div class="text-sm text-gray-600 group-hover:text-blue-600">
            关注
        </div>
    </a>

    <a href="#" class="text-center group">
        <div class="text-xl font-bold text-gray-900 group-hover:text-blue-600">
            {{ count($user->followers) }}
        </div>
        <div class="text-sm text-gray-600 group-hover:text-blue-600">
            粉丝
        </div>
    </a>

    <a href="#" class="text-center group">
        <div class="text-xl font-bold text-gray-900 group-hover:text-blue-600">
            {{ $user->statuses()->count() }}
        </div>
        <div class="text-sm text-gray-600 group-hover:text-blue-600">
            微博
        </div>
    </a>
</div>