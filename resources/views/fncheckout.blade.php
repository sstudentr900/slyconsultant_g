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
  .fncheckoutContent {
    background: rgba(202, 206, 219, 0.30);
    padding: 80px 0 150px;
  }

  .fncheckoutContent .topContent {
    text-align: center;
  }

  .fncheckoutContent .topContent .retitle {
    color: #62678E;
    font-size: 21px;
    font-weight: 500;
  }

  .fncheckoutContent .topContent .title {
    color: #282938;
    font-size: 48px;
    font-weight: 600;
  }

  .fncheckoutContent .bottomContent {
    background: #FFF;
    padding: 50px 70px;
    margin-top: 65px;
    display: flex;
    gap: 40px;
  }

  .fncheckoutContent .bottomContent .title {
    color: #212B36;
    font-size: 21px;
    font-weight: 700;
    margin-bottom: 30px;
  }

  .fncheckoutContent .info {
    width: 55%;
  }

  .fncheckoutContent .info .itemDiv {
    display: flex;
    gap: 15px;
  }

  .fncheckoutContent .info .item {
    margin-bottom: 32px;
    width: 100%;
  }

  .fncheckoutContent .info .input {
    position: relative;
  }

  .fncheckoutContent .info input {
    padding: 12px 18px;
    border-radius: 5px;
    border: 1px solid #CCD0D7;
    width: 100%;
  }

  .fncheckoutContent .info label {
    color: #232536;
    font-size: 15px;
    font-weight: 400;
    margin-bottom: 10px;
    display: block;
  }

  .fncheckoutContent .info label span {
    color: #CD5B26;
  }

  .fncheckoutContent .info textarea {
    width: 100%;
    padding: 12px 18px;
    border-radius: 5px;
    border: 1px solid #CCD0D7;
    width: 100%;
    min-height: 150px;
  }

  .fncheckoutContent .order {
    width: 45%;
    border: 3px solid #E6ECF1;
    padding: 28px 36px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .fncheckoutContent .order .item {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #E9EDF4;
    padding: 18px 0;
  }

  .fncheckoutContent .order .name {
    color: #72737F;
    font-size: 18px;
    font-weight: 400;
  }

  .fncheckoutContent .order .name span {
    /* color: #181C25; */
    /* font-size: 21px; */
    /* font-weight: 700; */
    margin-left: 16px;
  }

  .fncheckoutContent .order .price {
    /* color: #000; */
    text-align: right;
    /* font-size: 18px;
      font-weight: 400; */
  }

  .fncheckoutContent .order .totlePrice {
    border-bottom: none;
    /* margin-top: 80px; */
  }

  /* .fncheckoutContent .order .totlePrice .name{
      color: #181C25;
      font-size: 18px;
      font-weight: 400;
    } */
  .fncheckoutContent .order .totlePrice .name,
  .fncheckoutContent .order .totlePrice .price {
    color: #000;
    text-align: right;
    font-size: 21px;
    font-weight: 700;
  }

  .fncheckoutContent .radioDiv {
    margin-top: 80px;
  }

  .fncheckoutContent .publicRadioButton input {
    display: none;
  }

  .fncheckoutContent .publicRadioButton label {
    color: #181C25;
    font-size: 18px;
    font-weight: 400;
    width: 100%;
    padding: 18px 24px;
    border-radius: 5px;
    border: 1px solid #CCD0D7;
    margin-bottom: 20px;
    cursor: pointer;
    display: block;
    position: relative;
    padding-left: 54px;
  }

  .fncheckoutContent .publicRadioButton label::after {
    content: '';
    width: 20px;
    height: 20px;
    border-radius: 15px;
    border: 1px solid #A7A8AF;
    position: absolute;
    left: 22px;
    top: 22px;
  }

  .fncheckoutContent input:checked+label::after {
    border: 6px solid #CD5B26;
  }

  .fncheckoutContent .checkout {
    color: #FFF;
    text-align: center;
    font-size: 16px;
    font-weight: 400;
    background: #CD5B26;
    padding: 18px;
    cursor: pointer;
    width: 100%;
    border: none;
  }
</style>
@endpush
@endonce
{{-- html --}}
<div class="fncheckoutContent">
  <form method="post" action="{{ route('fnpayment') }}" id="form1" onclick="return false">
    {!! csrf_field() !!}
    <div class="publicWidth">
      <div class="topContent">
        <p class="retitle">Checkout</p>
        <h2 class="title">結帳</h2>
      </div>
      <div class="bottomContent">
        <div class="info">
          <div class="title">個人資訊</div>
          <div class="itemDiv">
            <div class="item">
              @include('layouts.input',['type'=>'text','id'=>'username','label'=>'姓名','require'=>true,'place'=>'王大明'])
            </div>
            <div class="item">
              @include('layouts.input',['type'=>'phone','id'=>'phone','label'=>'連絡電話','require'=>true,'place'=>'0925555666'])
            </div>
          </div>
          <div class="itemDiv">
            <div class="item">
              @include('layouts.input',['type'=>'text','id'=>'city','label'=>'縣市','require'=>true,'place'=>'高雄市'])
            </div>
            <div class="item">
              @include('layouts.input',['type'=>'text','id'=>'township','label'=>'鄉鎮市區','require'=>true,'place'=>'左營區'])
            </div>
          </div>
          <div class="item">
            @include('layouts.input',['type'=>'text','id'=>'address','label'=>'街道地址','require'=>true])
          </div>
          <div class="item">
            @include('layouts.input',['type'=>'email','id'=>'email','label'=>'電子郵件','require'=>true])
          </div>
          <div class="item" style="margin-bottom: 0;">
            @include('layouts.input',['type'=>'textarea','id'=>'remark','label'=>'備註'])
          </div>
        </div>
        <div class="order">
          <div class="title">您的訂單</div>
          <div class="commodityDiv">
            <div class="topDiv item">
              <div class="name">商品</div>
              <div class="price">小計</div>
            </div>
            <div class="itemDiv">
              <!--{{--<div class="item">
                  <div class="name">代書諮詢 / 時<span>*1</span></div>
                  <div class="price">NT$ 600</div>
                  <input type="hidden" name="item[{{$list['id']}}][]" value="{{$list['number']}}">
              </div>--}} -->
            </div>
            <div class="nowPrice item">
              <div class="name">小計</div>
              <div class="price">NT$ 0</div>
            </div>
            <div class="freightPrice item">
              <div class="name">運費</div>
              <div class="price">NT$ 0</div>
            </div>
            <div class="totlePrice item">
              <div class="name">總計</div>
              <div class="price">NT$ 0</div>
            </div>
          </div>
          <!-- <div class="radioDiv">
                <div class="publicRadioButton">
                  <input type="radio" value="1" id="Radio1" name="payment" checked="">
                  <label for="Radio1">信用卡 一次付清</label>
                </div>
                <div class="publicRadioButton">
                  <input type="radio" value="2" id="Radio2" name="payment">
                  <label for="Radio2">銀行轉帳</label>
                </div>
              </div> -->
          <div class="checkoutDiv">
            <input type="submit" class="checkout" value="結帳" id="button">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
{{-- 引入fn_footer模板 --}}
@include('layouts.fn_footer')
{{-- js --}}
<script>
  function formSend() {
    document.querySelector('#button').addEventListener('click', function() {
      // console.log('send')
      if (car_search({
          obj: 'car'
        })) {
        document.querySelector('#form1').submit();
      } else {
        car_delet({
          obj: 'car'
        })
        alert('錯誤請重新操作')
        window.location = "{{ route('fnindex') }}";
      }
    })
  }

  function creatHtml({
    json
  }) {
    // console.log('260',json)
    const bottomContent = document.querySelector('.bottomContent')
    const itemDiv = bottomContent.querySelector('.order .itemDiv')
    itemDiv.innerText = ''
    json['data'].forEach(item => {
      // console.log(item['title'])
      const html = `<div class="item">
          <div class="name">${item['title']}<span>x ${item['number']}</span></div>
          <div class="price">NT$ ${item['special_offer']}</div>
          <input type="hidden" name="item[${item['id']}]" value="${item['number']}">
        </div>`
      // console.log(html)
      itemDiv.insertAdjacentHTML('beforeend', html)
    })
    bottomContent.querySelector('.nowPrice .price').innerText = 'NT$ ' + json['nowPrice'];
    bottomContent.querySelector('.freightPrice .price').innerText = 'NT$ ' + json['freightPrice'];
    bottomContent.querySelector('.totlePrice .price').innerText = 'NT$ ' + json['totlePrice'];
  }

  function fncheckout() {
    const car = car_search({
      obj: 'car'
    })
    //console.log('car', car)
    if (!car || !car.length) {
      alert('目前沒有資料');
      window.location = "{{ route('fnindex') }}";
      return false;
    }
    fetch("{{ route('fncheckout_post') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
          car: car
        })
      })
      .then(response => response.json())
      .then(json => {
        if (!json['status']) {
          alert(json['message'])
        } else {
          creatHtml({
            json: json
          })
          formSend()
        }
      })
  }
  window.onload = fncheckout
</script>
@endsection