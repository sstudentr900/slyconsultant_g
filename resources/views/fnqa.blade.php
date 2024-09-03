{{-- 指定繼承 layouts.master 母模板  --}}
@extends('layouts.fn')
{{--  傳送資料到母模板，並指定變數為content --}}
@section('content')
@include('layouts.fn_nav')
@include('layouts.fn_qa')
@include('layouts.fn_footer')
<script>
  window.onload = function () {
    navFn();//選單
  }
</script>
@endsection