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
  .fncarContent {
    background: rgba(202, 206, 219, 0.30);
    padding: 80px 0 150px;
  }

  .fncarContent .topContent {
    text-align: center;
  }

  .fncarContent .topContent .retitle {
    color: #62678E;
    font-size: 21px;
    font-weight: 500;
  }

  .fncarContent .topContent .title {
    color: #282938;
    font-size: 48px;
    font-weight: 600;
  }

  .fncarContent .bottomContent {
    background: #FFF;
    padding: 50px 70px;
    margin-top: 65px;
  }

  .fncarContent .item {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #E9EDF4;
  }

  .fncarContent .item>div {
    padding: 24px 10px;
  }

  .fncarContent .item .price {
    display: flex;
    align-items: baseline;
  }

  .fncarContent .item .price h5 {
    color: #DD703F;
    font-size: 24px;
    font-weight: 700;
  }

  .fncarContent .item .price span {
    color: #898989;
    font-size: 16px;
    font-weight: 400;
    margin-left: 12px;
    text-decoration: line-through;
  }

  .fncarContent .item:nth-child(1) {
    border-bottom: 1px solid #cacbd5;
  }

  .fncarContent .item .commodityDiv {
    width: 50%;
    display: flex;
    align-items: center;
  }

  .fncarContent .item .commodityDiv .img {
    width: 120px;
  }

  .fncarContent .item .commodityDiv img {
    width: 100%;
    height: auto;
  }

  .fncarContent .item .commodityDiv .title {
    color: #181C25;
    font-size: 21px;
  }

  .fncarContent .item .commodityDiv .textDiv {
    margin-left: 20px;
  }

  .fncarContent .item .numberDiv {
    width: 20%;
  }

  .fncarContent .item .numberDiv .customNumber {
    max-width: 120px;
  }

  .fncarContent .item .priceDiv {
    width: 20%;
  }

  .fncarContent .item .controlDiv {
    width: 10%;
  }

  .fncarContent .item .controlDiv .delete {
    width: 20px;
    cursor: pointer;
  }

  .fncarContent .otherDiv {
    display: flex;
    align-items: center;
    border: 1px solid #E1E1E1;
    background: rgba(239, 239, 239, 0.50);
    padding: 45px;
    margin-top: 220px;
  }

  .fncarContent .otherDiv .carDiv {
    display: flex;
    align-items: center;
    width: 75%;
    border-right: 1px solid #cacbd5;
  }

  .fncarContent .otherDiv .carDiv .title {
    color: #212B36;
    font-size: 21px;
    font-weight: 700;
    margin-bottom: 16px;
  }

  .fncarContent .otherDiv .carDiv .price,
  .fncarContent .otherDiv .carDiv .label {
    color: #181C25;
    font-size: 16px;
    font-weight: 400;
  }

  .fncarContent .otherDiv .carDiv .car {
    width: 45%;
  }

  .fncarContent .otherDiv .carDiv .car .text {
    display: flex;
    justify-content: space-between;
  }

  .fncarContent .otherDiv .carDiv .car .text li {
    display: flex;
  }

  .fncarContent .otherDiv .carDiv .car .price {
    margin-left: 16px;
  }

  .fncarContent .otherDiv .carDiv .totleDiv {
    width: 55%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .fncarContent .otherDiv .carDiv .totleDiv .price {
    color: #CD5B26;
    font-size: 21px;
    font-weight: 700;
  }

  .fncarContent .otherDiv .btnDiv {
    width: 25%;
    display: flex;
    align-items: center;
    justify-content: end;
  }

  .fncarContent .otherDiv .checkout {
    color: #FFF;
    font-size: 16px;
    font-weight: 400;
    background: #CD5B26;
    width: 80%;
    padding: 16px;
    text-align: center;
    cursor: pointer;
    border: none;
    display: none;
  }

  .fncarContent .otherDiv .checkout.active {
    display: block;
  }

  /*customNumber */
  .customNumber {
    user-select: none;
    display: flex;
    border: 1px solid #eee;
    padding: 0 12px;
  }

  .customNumber .reduce,
  .customNumber .add {
    width: 20%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .customNumber .input {
    /* margin: 0 15px; */
    width: 60%;
    padding: 5px 10px;
  }

  .customNumber input {
    width: 100%;
    border: none;
    text-align: center;
  }

  /* Chrome, Safari, Edge, Opera */
  .customNumber input::-webkit-outer-spin-button,
  .customNumber input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  /* .customNumber input{
      -moz-appearance: textfield;
    } */
</style>
@endpush
@endonce
{{-- html --}}
<div class="fncarContent">
  <!-- <form method="get" action="{{ route('fncheckout') }}">
      {{ csrf_field() }} -->
  <div class="publicWidth">
    <div class="topContent">
      <p class="retitle">shopping cart</p>
      <h2 class="title">購物車</h2>
    </div>
    <div class="bottomContent">
      <div class="item">
        <div class="commodityDiv">商品</div>
        <div class="numberDiv">數量</div>
        <div class="priceDiv">小計</div>
        <div class="controlDiv"></div>
      </div>
      <div class="itemDiv">
        {{--<div class="item">
              <div class="commodityDiv">
                <div class="img">
                  <img src="{{ URL::asset('images/fnsevice01.png') }}" alt="">
      </div>
      <div class="textDiv">
        <div class="title">法律諮詢 / 時</div>
        <div class="price">
          <h5>$1000</h5><span></span>
        </div>
      </div>
    </div>
    <div class="numberDiv">
      @include('layouts.customNumber')
    </div>
    <div class="priceDiv">
      <div class="price">
        <h5>$1000</h5>
      </div>
    </div>
    <div class="controlDiv">
      <div class="delete">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.54545 5.81818C6.94712 5.81818 7.27273 6.14379 7.27273 6.54545V11.2727C7.27273 11.6744 6.94712 12 6.54545 12C6.14379 12 5.81818 11.6744 5.81818 11.2727V6.54545C5.81818 6.14379 6.14379 5.81818 6.54545 5.81818Z" fill="#232536" />
          <path d="M10.1818 6.54545C10.1818 6.14379 9.85621 5.81818 9.45455 5.81818C9.05288 5.81818 8.72727 6.14379 8.72727 6.54545V11.2727C8.72727 11.6744 9.05288 12 9.45455 12C9.85621 12 10.1818 11.6744 10.1818 11.2727V6.54545Z" fill="#232536" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.28691 0C6.02131 0 5.77684 0.144784 5.64917 0.377684L4.6602 2.18182H0.727273C0.325611 2.18182 0 2.50743 0 2.90909C0 3.31075 0.325611 3.63636 0.727273 3.63636H1.81818V15.2727C1.81818 15.6744 2.14379 16 2.54545 16H13.4545C13.8562 16 14.1818 15.6744 14.1818 15.2727V3.63636H15.2727C15.6744 3.63636 16 3.31075 16 2.90909C16 2.50743 15.6744 2.18182 15.2727 2.18182H11.344L10.3778 0.383124C10.2511 0.147191 10.0049 0 9.73713 0H6.28691ZM9.69288 2.18182L9.30223 1.45455H6.71762L6.31895 2.18182H9.69288ZM3.27273 3.63636V14.5455H12.7273V3.63636H3.27273Z" fill="#232536" />
        </svg>
      </div>
    </div>
  </div>--}}
</div>
<div class="otherDiv">
  <div class="carDiv">
    <div class="car">
      <div class="title">購物車總計</div>
      <ul class="text">
        <li>
          <div class="label">小計</div>
          <div class="price nowPrice">NT$ 0</div>
        </li>
        <li>
          <div class="label">運費</div>
          <div class="price freightPrice">NT$ 0</div>
        </li>
      </ul>
    </div>
    <div class="totleDiv">
      <div class="totle">
        <div class="label">總計</div>
        <div class="price totlePrice">NT$ 0</div>
      </div>
    </div>
  </div>
  <div class="btnDiv">
    <!-- <input type="submit" class="checkout" value="前往結帳"> -->
    <a class="checkout" href="{{ route('fncheckout') }}">前往結帳</a>
  </div>
</div>
</div>
</div>
<!-- </form> -->
</div>
{{-- 引入fn_footer模板 --}}
@include('layouts.fn_footer')
{{-- js --}}
<script>
  function deletData({
    obj
  }) {
    const btns = obj.querySelectorAll('.delete')
    btns.forEach(item => {
      item.addEventListener('click', function() {
        if (confirm('你確定要刪除')) {
          car_delet({
            obj: 'car',
            id: this.dataset.id
          })
          const car = car_search({
            obj: 'car'
          })
          if (!car || !car.length) {
            window.location = "{{ route('fnindex') }}";
            return false;
          } else {
            fncar()
          }
        }
      })
    })

  }

  function updataTotle({
    obj
  }) {
    const [...customNumber] = obj.querySelectorAll('.customNumber input[type="number"]')
    // if(!customNumber.length){return false;}
    const freightPrice = obj.querySelector('.freightPrice')
    const price = customNumber.map(item => Number(item.value) * Number(item.dataset.price)).reduce((a, c) => a + c)
    const getItem = car_search({
      obj: 'car'
    })
    // console.log(`nowGetItem:${getItem}`)
    //更新 localStorage
    customNumber.forEach((o, i) => {
      getItem[i] = [o.dataset.id, o.value]
      o.closest('.item').querySelector('.priceDiv h5').innerText = '$' + Number(o.value) * Number(o.dataset.price)
    })
    // car_delet('car')
    localStorage.setItem('car', JSON.stringify(getItem));
    // console.log(getItem)
    // console.log(`after2NowItem:${getItem}`)
    obj.querySelector('.nowPrice').innerText = price
    obj.querySelector('.totlePrice').innerText = price + Number(freightPrice.innerText.split('$')[1])
  }

  function quantity({
    obj
  }) {
    // console.log(`quantity`)
    const customNumber = obj.querySelectorAll('.customNumber')
    // if(!customNumber.length){return false;}
    customNumber.forEach(item => {
      const input = item.querySelector('input[type="number"]');
      const btnReduce = item.querySelector('.reduce');
      const btnAdd = item.querySelector('.add');
      const min = 1;
      btnAdd.addEventListener('click', function() {
        // console.log(`btnAdd`,input)
        let oldValue = parseInt(input.value);
        !oldValue ? oldValue = 1 : oldValue++;
        input.value = oldValue
        updataTotle({
          obj
        })
      })
      btnReduce.addEventListener('click', function() {
        // console.log(`btnReduce`,input)
        let oldValue = parseInt(input.value);
        !oldValue || oldValue <= min ? oldValue = 1 : oldValue--;
        input.value = oldValue
        updataTotle({
          obj
        })
      });
      input.addEventListener('change', function() {
        // console.log(`change`,input)
        let oldValue = parseInt(input.value);
        if (!oldValue || oldValue <= min) oldValue = 1;
        input.value = oldValue
        updataTotle({
          obj
        })
      })
    })

  }

  function creatHtml({
    datas
  }) {
    const bottomContent = document.querySelector('.bottomContent')
    const itemDiv = bottomContent.querySelector('.itemDiv')
    itemDiv.innerText = ''
    datas.forEach(item => {
      // console.log(item)
      const src = "{{ URL::asset('images/') }}"
      const html = `<div class="item">
          <div class="commodityDiv">
            <div class="img">
              <img src="${src}/${item['cover']}" alt=""> 
            </div>
            <div class="textDiv">
              <div class="title">${item['title']}</div>
              <div class="price"><h5>$${item['special_offer']}</h5><span>$${item['price']}</span></div>
            </div>
          </div>
          <div class="numberDiv">
            <div class="customNumber">
              <div class="reduce">
                <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.79167 0C9.93056 0 10 0.111111 10 0.333333V1.66667C10 1.88889 9.93056 2 9.79167 2H0.208333C0.0694444 2 0 1.88889 0 1.66667V0.333333C0 0.111111 0.0694444 0 0.208333 0H9.79167Z" fill="#454545"/>
                </svg>
              </div>
              <div class="input">
                <input type="number" value="${item['number']}" step="1" min="1" name="number[${item['id']}]" data-price="${item['special_offer']}" data-id="${item['id']}">
              </div>
              <div class="add">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.79167 4C9.93056 4 10 4.11111 10 4.33333V5.66667C10 5.88889 9.93056 6 9.79167 6H0.208333C0.0694444 6 0 5.88889 0 5.66667V4.33333C0 4.11111 0.0694444 4 0.208333 4H9.79167Z" fill="#454545"/>
                <path d="M6 9.79167C6 9.93056 5.88889 10 5.66667 10H4.33333C4.11111 10 4 9.93056 4 9.79167L4 0.208333C4 0.0694444 4.11111 -9.71341e-09 4.33333 0L5.66667 5.8282e-08C5.88889 6.79956e-08 6 0.0694445 6 0.208333L6 9.79167Z" fill="#454545"/>
                </svg>
              </div>
            </div>
          </div>
          <div class="priceDiv">
            <div class="price"><h5>$${item['special_offer']}</h5></div>
          </div>
          <div class="controlDiv">
            <div class="delete" data-id="${item['id']}">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.54545 5.81818C6.94712 5.81818 7.27273 6.14379 7.27273 6.54545V11.2727C7.27273 11.6744 6.94712 12 6.54545 12C6.14379 12 5.81818 11.6744 5.81818 11.2727V6.54545C5.81818 6.14379 6.14379 5.81818 6.54545 5.81818Z" fill="#232536"/>
                <path d="M10.1818 6.54545C10.1818 6.14379 9.85621 5.81818 9.45455 5.81818C9.05288 5.81818 8.72727 6.14379 8.72727 6.54545V11.2727C8.72727 11.6744 9.05288 12 9.45455 12C9.85621 12 10.1818 11.6744 10.1818 11.2727V6.54545Z" fill="#232536"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.28691 0C6.02131 0 5.77684 0.144784 5.64917 0.377684L4.6602 2.18182H0.727273C0.325611 2.18182 0 2.50743 0 2.90909C0 3.31075 0.325611 3.63636 0.727273 3.63636H1.81818V15.2727C1.81818 15.6744 2.14379 16 2.54545 16H13.4545C13.8562 16 14.1818 15.6744 14.1818 15.2727V3.63636H15.2727C15.6744 3.63636 16 3.31075 16 2.90909C16 2.50743 15.6744 2.18182 15.2727 2.18182H11.344L10.3778 0.383124C10.2511 0.147191 10.0049 0 9.73713 0H6.28691ZM9.69288 2.18182L9.30223 1.45455H6.71762L6.31895 2.18182H9.69288ZM3.27273 3.63636V14.5455H12.7273V3.63636H3.27273Z" fill="#232536"/>
              </svg>
            </div>
          </div>
        </div>`
      itemDiv.insertAdjacentHTML('beforeend', html)
    })
    //add number
    quantity({
      obj: bottomContent
    });
    //delet data
    deletData({
      obj: bottomContent
    })
    //updataTotle 
    updataTotle({
      obj: bottomContent
    })
  }

  function fncar() {
    // document.querySelector('.checkout').classList.add('active')
    const car = car_search({
      obj: 'car'
    })
    if (!car || !car.length) {
      alert('購物車沒有資料跳回首頁');
      window.location = "{{ route('fnindex') }}";
      return false;
    }
    fetch("{{ route('fncar_post') }}", {
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
          car_delet({
            obj: 'car'
          })
          window.location = "{{ route('fnindex') }}";
        } else {
          document.querySelector('.checkout').classList.add('active')
          creatHtml({
            datas: json['data']
          })
        }
      })
  }
  window.onload = fncar
</script>
@endsection