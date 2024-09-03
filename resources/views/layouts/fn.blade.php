<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  @include('layouts.public_head')
  <link href="{{ asset('css/fnapp.css?').time() }}" rel="stylesheet" type="text/css">{{--  共用css　--}}
  <!-- <link href="{{ asset('/css/fn.css?').time() }}" rel="stylesheet" type="text/css">  -->
  <!-- <script src="{{ asset('/plugins/layerslider/js/jquery.js') }}" type="text/javascript"></script> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"></link>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('js/default.js?').time()}}"></script>{{--  共用js　--}}
  <script src="{{ asset('/js/fn.js?').time() }}" type="text/javascript"></script> -->
  @stack('customStyle')
  @stack('customScript')
</head>
<body>
  <div class="fnmain {{ request()->route()->getName() }}">
    {{-- 載入主畫面  --}}
    @yield('content')
  </div>
</body>
</html>
