<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Weibo App')-Laravel 新手入门教程</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  </head>
  <body>
    @include('layouts._header')
    <div class="container mx-auto">
      <div class="md:ml-12 md:w-10/12">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
  </body>
</html>