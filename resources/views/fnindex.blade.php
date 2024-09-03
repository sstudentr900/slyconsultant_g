{{-- 指定繼承 layouts.master 母模板  --}}
@extends('layouts.fn')
{{--  傳送資料到母模板，並指定變數為content --}}
@section('content')
  @include('layouts.fn_nav')
  @include('fnindex_header')
  @include('layouts.fn_qa',['src'=>'fnqa','pageTotle'=>'1'])
  @include('fnindex_about')
  @include('fnindex_professional')
  {{-- @include('fnindex_search') --}}
  @include('fnindex_service')
  @include('fnindex_contact')
  @include('layouts.fn_footer')
  <script>
    window.onload = function(){
      //服務項目
      fnservice()
    }
  </script>
@endsection