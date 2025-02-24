@if (count($errors) > 0)
  <div class="mb-6 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
    <ul class="list-inside list-disc pl-5">
      @foreach($errors->all() as $error)
        <li class="text-red-700">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif