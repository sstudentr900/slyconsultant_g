<!DOCTYPE html>
<html lang="zh-tw">
  <head>
      @include('layouts.public_head')
      <link href="{{ URL::asset('css/baapp.css').'?'.rand() }}" rel="stylesheet" type="text/css">{{--  共用css　--}}
      <!-- <link href="{{ URL::asset('css/badefault.css').'?'.rand() }}" rel="stylesheet" type="text/css"> -->
      <!-- <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ URL::asset('js/tinymce/tinymce.min.js').'?'.rand() }}"></script> -->
      <!-- <script src="{{ URL::asset('js/baapp.js')}}"></script> -->
      <!-- <script src="{{ URL::asset('js/default.js').'?'.rand() }}"></script> -->
      <!-- <script src="{{ URL::asset('js/badefault.js').'?'.rand() }}"></script> -->
      @stack('customStyle')
      @stack('customScript')
  </head>
  <body>
    <div class="bamain {{ $active }}">
      {{--@include('layouts.baload')--}}
      @include('layouts.bamenu')
      <div class="publicMain">
        <div class="publicMainBox">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
