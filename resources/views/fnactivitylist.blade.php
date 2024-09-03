@extends('layouts.fnmain')
<!-- @section('css')
<link rel="stylesheet" href="{{ asset('css/activity-record.css') }}">
@endsection -->
@section('title', $pageChName)
@section('description', $pageChName)
@section('content')
  @include('layouts.customBreadcrumbs', ['title' => $pageChName,'values'=>$breadcrumbs])
  @include('layouts.customHorizontalSort', ['values' => $datas])
@endsection
