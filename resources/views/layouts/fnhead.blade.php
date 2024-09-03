<head>
  <meta charset="UTF-8" />
  <base href="{{ URL::to('/') }}/">{{-- #基本路徑 --}}
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
  <meta name="format-detection" content="telephone=no" />
  <title></title>
  <meta name="description" content="" />{{--  頁面描述　--}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('css/default.css?').time() }}" rel="stylesheet" type="text/css">{{--  共用css　--}}
  <link href="{{ asset('/css/fn.css?').time() }}" rel="stylesheet" type="text/css">
  @stack('customStyle')
  <script src="{{ asset('/plugins/layerslider/js/jquery.js') }}" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"></link>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('js/default.js?').time()}}"></script>{{--  共用js　--}}
  <script src="{{ asset('/js/fn.js?').time() }}" type="text/javascript"></script>
</head>
