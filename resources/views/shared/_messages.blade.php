@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
    <div class="fixed top-4 right-4 z-50 animate-fade-in-down">
      <div class="rounded-lg p-4 mb-4 text-sm
        @if($msg == 'danger')
          bg-red-100 text-red-700
        @elseif($msg == 'warning')
          bg-yellow-100 text-yellow-700
        @elseif($msg == 'success')
          bg-green-100 text-green-700
        @else
          bg-blue-100 text-blue-700
        @endif
        flex items-center shadow-lg max-w-sm">
        <div class="mr-3">
          @if($msg == 'danger')
            <svg class="h-5 w-5 text-red-700" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
            </svg>
          @elseif($msg == 'warning')
            <svg class="h-5 w-5 text-yellow-700" fill="currentColor" viewBox="0 0 20 20">
              <path d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"/>
            </svg>
          @elseif($msg == 'success')
            <svg class="h-5 w-5 text-green-700" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
          @else
            <svg class="h-5 w-5 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
              <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
            </svg>
          @endif
        </div>
        <p>{{ session()->get($msg) }}</p>
      </div>
    </div>
  @endif
@endforeach

<style>
  .animate-fade-in-down {
    animation: fadeInDown 0.5s ease-out forwards;
  }
  
  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>