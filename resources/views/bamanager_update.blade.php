{{--指定繼承 layouts.master 母模板--}}
@extends('layouts.ba')

{{--傳送資料到母模板，並指定變數為content--}}
@section('content')
  @include('layouts.banav',['addbtn'=>'n'])
  @include('layouts.bacontent_update',['forms'=>$forms])
  <script>
    imgFn(120,120)
  </script>
@endsection