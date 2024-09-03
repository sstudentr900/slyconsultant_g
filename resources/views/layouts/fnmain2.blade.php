<!DOCTYPE html>
<html lang="zh-Hant-TW">
@include('layouts.fnhead')
<body>
  <style>
    .fn{
      background: linear-gradient(180deg, #3E36B0 0%, #2B2761 100%);
    }
  </style>
  <div class="fn {{$active}}">
    @include('layouts.fnmenu')
    @include('layouts.fncontent')
  </div>
</body>
</html>
