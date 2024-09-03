<!DOCTYPE html>
<html lang="zh-tw">
  <head>
    @include('layouts.public_head')
    <link href="{{ asset('css/baapp.css').'?'.rand() }}" rel="stylesheet" type="text/css">{{-- 共用css　--}}
    @stack('customStyle')
    @stack('customScript')
  </head>
  <body>
    @yield('content')
  </body>
</html>
