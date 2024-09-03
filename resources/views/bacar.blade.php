{{--指定繼承 layouts.master 母模板--}}
@extends('layouts.ba')


{{-- 傳送資料到母模板，並指定變數為content --}}
@section('content')
  @include('layouts.banav',['addbtn'=>'n'])
  @once
@push('customStyle')
<style>
  .publicMainContent_search{
      padding: 20px 15px;
      color: #777;
  }
  .publicMainContent_search li{
      display: flex;
      align-items: stretch;
      justify-content: space-between;
      border-bottom: 1px solid #ddd;
      font-size: 14px;
      list-style: none;
  }
  .publicMainContent_search li>div {
      flex: 1;
      padding: 15px 10px;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      justify-content: center;
  }
  .publicMainContent_search .coverDiv img{
    width: 100%;
    max-width: 60px;
    height: auto;
    max-height: 60px;
    object-fit: contain;
  }
  .publicMainContent_search ul:nth-child(1) li p{
    color: #444;
    font-weight: bold;
  }
  /* ,
  .publicMainContent_search li>div.sortDiv, */
  /* .publicMainContent_search li>div.idDiv{
    flex: 0 0 60px;
  }
  .publicMainContent_search li>div.releaseDiv{
    flex: 0 0 80px;
  }
  .publicMainContent_search li>div.updated_atDiv{
    flex: 0 0 180px;
  } */
  .publicMainContent_search li>div.merchant_noDiv,
  .publicMainContent_search li>div.payment_typeDiv,
  .publicMainContent_search li>div.inforDiv,
  .publicMainContent_search li>div.orderlistDiv{
    flex: 2;
    flex-direction: column;
    align-items: start;
  }
  .publicMainContent_search li>div.orderlistDiv p span+span,
  .publicMainContent_search li>div.inforDiv p span+span{
    margin-left: 12px;
  }
  .publicMainContent_search li>div.payment_typeDiv{
    flex-direction: column;
    align-items: start;
  }
  .publicMainContent_search li>div.modifyDiv{
    flex: 0 0 50px;
  }
</style>
@endpush
@endonce
<div class="publicMainContent_search">
  <ul>
    <li>
      <!-- <div class='ridDiv'>
        <p>#</p>
      </div> -->
      <div class='merchant_noDiv'>
        <p>編號</p>
      </div>
      <!-- <div class='created_atDiv'>
        <p>創建時間</p>
      </div> -->
      <!-- <div class='orderstatusDiv'>
        <p>當前狀態</p>
      </div> -->
      <!-- <div class='coverDiv'>
        <p>圖片</p>
      </div>
      <div class='accountDiv'>
        <p>帳號</p>
      </div> -->
      <div class='inforDiv'>
        <p>個人資料</p>
      </div>
      <div class='orderlistDiv'>
        <p>購買商品</p>
      </div>
      <!-- <div class='remarkDiv'>
        <p>購買備註</p>
      </div> -->
      <div class='payment_typeDiv'>
        <p>狀態</p>
      </div>
      <!-- <div class='phoneDiv'>
        <p>電話</p>
      </div>
      <div class='addressDiv'>
        <p>地址</p>
      </div>
      <div class='emailDiv'>
        <p>信箱</p>
      </div> -->
      <!-- <div class='releaseDiv'>
        <p>狀態</p>
      </div> -->
      <div class='modifyDiv'>
        <p>動作</p>
      </div>
    </li>
  </ul>
  <ul>
    @foreach($datas as $data)
    <li>
      <!-- <div class='ridDiv'>
        <p>{{ $data->rid }}</p>
      </div> -->
      <div class='merchant_noDiv'>
        <p>訂單編號 : {{ $data->merchant_no }}</p>
        <p>金流編號 : {{ $data->trade_no }}</p>
      </div>
      <!-- <div class='created_atDiv'>
        <p>{{ $data->created_at }}</p>
      </div> -->
      <!-- <div class='orderstatusDiv'>
        <p>{{ $data->orderstatus }}</p>
      </div> -->
      <!-- <div class='coverDiv'>
        <img src="{{ URL::asset(config('app.imgName')).'/'.$data->cover.'?'.rand() }}">
      </div>
      <div class='accountDiv'>
        <p>{{ $data->account }}</p>
      </div> -->
      <div class='inforDiv'>
        {{--<p><span>姓名 : {{ $data->username }}</span><span>電話 : {{ $data->phone }}</span></p>
        <p>信箱 : {{ $data->email }}</p>
        <p>地址 : {{ $data->city }},{{ $data->township }},{{ $data->address }}</p>--}}
        <p>姓名 : {{ $data->username }}</p>
        <p>電話 : {{ $data->phone }}</p>
        <p>地址 : {{ $data->city }},{{ $data->address }}</p>
      </div>
      <div class='orderlistDiv'>
        @php
          $lists = explode(',',$data->orderlist);
          foreach ($lists as $list) {
            $array = explode('|',$list);
            echo '<p><span>'.$array[0].'</span><span>*'.$array[2].'</span><span>$'.$array[1]*$array[2].'</span></p>';
          }
        @endphp
      </div>
      {{--<div class='remarkDiv'>
        <p>{{ $data->remark }}</p>
      </div>--}}
      <div class='payment_typeDiv'>
        <p>付款方式 : {{ $data->payment_type }}</p>
        <p>目前狀態 : {{ $data->state }}</p>
        <p>總金額 : {{ $data->totle }}</p>
      </div>
      <!-- <div class='phoneDiv'>
        <p>{{ $data->phone }}</p>
      </div>
      <div class='addressDiv'>
        <p>{{ $data->phone }}</p>
      </div>
      <div class='emailDiv'>
        <p>{{ $data->email }}</p>
      </div>-->
      <!-- <div class='releaseDiv'>
        <p>{{ $data->release=='y'?'使用':'停用' }}</p>
      </div> -->
      @include('layouts.bamodify',['modify'=>false])
    </li>
    @endforeach
  </ul>
</div>
  @include('layouts.bapage')
@endsection