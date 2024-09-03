<!DOCTYPE html>
<html lang="zh-tw">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title></title>
      <link rel="icon" href="favicon.ico">
      <link href="{{ URL::asset('css/ba.css').'?'.rand() }}" rel="stylesheet" type="text/css">
      <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ URL::asset('js/tinymce/tinymce.min.js').'?'.rand() }}"></script>
      <script src="{{ URL::asset('js/default.js').'?'.rand() }}"></script>
      <script src="{{ URL::asset('js/badefault.js').'?'.rand() }}"></script>
  </head>
  <body>
    <style>
      .ba{
        background: linear-gradient(180deg, #3E36B0 0%, #2B2761 100%);
      }
    </style>
    <div class="ba {{$active}}">
      @include('layouts.bamenu')
      @include('layouts.bamain')
    </div>
  </body>
</html>
