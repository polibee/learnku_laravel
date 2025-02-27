@if ($feed_items->count() > 0)
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <ul class="divide-y divide-gray-200">
            @foreach ($feed_items as $status)
                @include('statuses._status', ['user' => $status->user])
            @endforeach
        </ul>
        <div class="px-6 py-4 bg-gray-50">
            {!! $feed_items->render() !!}
        </div>
    </div>
@else
    <div class="bg-white rounded-lg shadow-sm p-8">
        <p class="text-gray-500 text-center">还没有微博动态！</p>
    </div>
@endif