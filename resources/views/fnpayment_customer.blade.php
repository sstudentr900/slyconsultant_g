{{-- 指定繼承 layouts.fn 母模板  --}}
@extends('layouts.fn')
{{-- 傳送資料到母模板，並指定變數為content --}}
@section('content')
  {{-- 引入fn_nav模板 --}}
  @include('layouts.fn_nav')
  {{-- CSS --}}
  @once
  @push('customStyle')
  <style>
    .fnpayment_customer_content{
      background: rgba(202, 206, 219, 0.30);
      padding: 80px 0 40px;
    }
    .fnpayment_customer_content .topContent{
      text-align: center;
    }
    .fnpayment_customer_content .topContent .retitle{
      color: #62678E;
      font-size: 21px;
      font-weight: 500;
    }
    .fnpayment_customer_content .topContent .title{
      color: #282938;
      font-size: 48px;
      font-weight: 600;
    }
    .fnpayment_customer_content .itemDiv{
      background: #FFF;
      max-width: 500px;
      margin: auto;
      padding: 40px;
      margin-top: 30px;
      margin-bottom: 30px;
    }
    .fnpayment_customer_content .item{
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 16px;
      margin-bottom: 12px;
    }
    .fnpayment_customer_content .item .name{
      color: rgb(133 141 153);
    }
    .fnpayment_customer_content .item .text{
      color: rgb(26, 32, 44)
    }
    .fnpayment_customer_content .price{
      border-top: 3px solid rgb(226, 232, 240);
      border-bottom: 3px solid rgb(226, 232, 240);
      padding: 20px 0;
    }
    .fnpayment_customer_content .price .text{
      color: #e53e3e;
      font-weight: 800;
      font-size: 24px;
    }
    .fnpayment_customer_content .remark{
      color: #a0aec0;
      font-size: 14px;
      font-weight: 300;
    }
    .fnpayment_customer_content .blackBtn{
      background: #CD5B26;
      color: #FFF;
      font-size: 14px;
      font-weight: 700;
      padding: 12px;
      text-align: center;
      cursor: pointer;
      width: 140px;
      margin: auto;
      display: block;
    }
    .fnpayment_customer_content .store{
      margin-bottom: 12px;
      border-bottom: 3px solid rgb(226, 232, 240);
      padding: 0 0 5px;
    }
    .fnpayment_customer_content .store .title{
      font-size: 16px;
      color: rgb(133 141 153);
      margin-bottom: 8px;
    }
    .fnpayment_customer_content .store li{
      color: rgb(29, 42, 115);
      margin-bottom: 4px;
    }
  </style>
  @endpush
  @endonce
  {{--  html --}}
  <div class="fnpayment_customer_content">
    <div class="publicWidth">
      <div class="topContent">
        <p class="retitle">Payment information</p>
        <h2 class="title">繳費資訊</h2>
      </div>
      <div class="bottomContent">
        <div class="itemDiv">
          <!-- <div class="store">
            <div class="title">馨琳揚企管顧問(MS350339093)</div>
            <ul>
              <li>法律諮詢1 / 時*1</li>
              <li>代書諮詢1 / 時*1</li>
            </ul>
          </div> -->
          <div class="item">
            <div class="name">商店訂單編號</div>
            <div class="text">{{$params['MerchantOrderNo']}}</div>
          </div>
          <div class="item">
            <div class="name">藍新金流交易序號</div>
            <div class="text">{{$params['TradeNo']}}</div>
          </div>
          <!-- <div class="item">
            <div class="name">訂單金額</div>
            <div class="text">NT$ 1600</div>
          </div> -->
          <div class="item price">
            <div class="name">應付金額</div>
            <div class="text">NT$ {{$params['Amt']}}</div>
          </div>
          <div class="item">
            <div class="name">銀行代碼</div>
            <div class="text">{{$params['BankCode']}}</div>
          </div>
          <div class="item">
            <div class="name">轉帳帳號</div>
            <div class="text">{{$params['CodeNo']}}</div>
          </div>
          <div class="item">
            <div class="name">交易結果</div>
            <div class="text">{{$params['Message']}}</div>
          </div>
          <div class="item">
            <div class="name">有效繳費時間</div>
            <div class="text">{{$params['ExpireDate']}}</div>
          </div>
          <div class="remark">
            請記錄您的付款資料，並於繳費期限內完成支付，逾繳費時間該轉帳帳號將失效。您可至全台任一ATM自動櫃員機或透過任何銀行之網路ATM進行交易轉帳，完成轉帳後藍新金流將發送交易結果通知信至您的電子信箱。若逾繳費時間，本筆訂單將作廢，讓您重新下訂。
          </div>
        </div>
        <a class="blackBtn" href="{{ route('fnindex') }}">返回首頁</a>
      </div>
    </div>
  </div>
  {{-- 引入fn_footer模板 --}}
  @include('layouts.fn_footer')
  {{-- js --}}
  <script>
    function fnpayment_customer(){
    }
    window.onload = fnpayment_customer
  </script>
@endsection