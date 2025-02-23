<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Weibo App')-Laravel 新手入门教程</title>
    @vite('resources/css/app.css')
  </head>
  <body>
    @include('layouts._header')
    <div class="container mx-auto">
      <div class="md:ml-12 md:w-10/12">
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
  </body>
</html>