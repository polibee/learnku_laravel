<form action="{{ route('statuses.store') }}" method="POST" class="mb-6">
    @include('shared._errors')
    @csrf
    
    <textarea 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
        rows="3" 
        placeholder="聊聊新鲜事儿..." 
        name="content"
    >{{ old('content') }}</textarea>

    <div class="flex justify-end mt-3">
        <button type="submit" 
                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
            发布
        </button>
    </div>
</form>