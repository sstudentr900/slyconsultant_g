{{--指定繼承 layouts.master 母模板--}}
@extends('layouts.ba')


{{-- 傳送資料到母模板，並指定變數為content --}}
@section('content')
  @include('layouts.banav',['addbtn'=>'y'])
  @include('layouts.bacontent_serch')
  <!-- <div class="publicMainContent">
    <ul>
      <li>
        <div class='idDiv'>
          <p>#</p>
        </div>
        <div class='updatedDiv'>
          <p>修改時間</p>
        </div>
        <div class='coverDiv'>
          <p>圖片</p>
        </div>
        <div class='accountDiv'>
          <p>帳號</p>
        </div>
        <div class='nameDiv'>
          <p>姓名</p>
        </div>
        <div class='phoneDiv'>
          <p>電話</p>
        </div>
        <div class='releaseDiv'>
          <p>狀態</p>
        </div>
        <div class='modify'>
          <p>動作</p>
        </div>
      </li>
    </ul>
    <ul>
      @foreach($datas as $data)
      <li>
        <div class='idDiv'>
          <p>{{ $data->id }}</p>
        </div>
        <div class='updatedDiv'>
          <p>{{ $data->updated_at }}</p>
        </div>
        <div class='coverDiv'>
          <img src="{{ URL::asset(config('app.imgName')).'/'.$data->cover.'?'.rand() }}">
        </div>
        <div class='accountDiv'>
          <p>{{ $data->account }}</p>
        </div>
        <div class='nameDiv'>
          <p>{{ $data->name }}</p>
        </div>
        <div class='phoneDiv'>
          <p>{{ $data->phone }}</p>
        </div>
        <div class='releaseDiv'>
          <p>{{ $data->release=='y'?'使用':'停用' }}</p>
        </div>
        @include('layouts.bamodify')
      </li>
      @endforeach
    </ul>
  </div> -->
  @include('layouts.bapage')
@endsection