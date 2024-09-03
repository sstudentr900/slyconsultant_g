{{-- CSS --}}
@once
@push('customStyle')
<style>
  .fnserviceContent {
    background: #232536;
    padding: 80px 0;
  }

  .fnserviceContent .topContent {
    text-align: center;
  }

  .fnserviceContent .topContent .retitle {
    color: #62678E;
    font-size: 21px;
    font-weight: 500;
  }

  .fnserviceContent .topContent .title {
    color: #fff;
    font-size: 48px;
    font-weight: 600;
  }

  .fnserviceContent .publicPage li a {
    font-size: 16px;
  }

  .fnserviceContent .publicPage li a.pre,
  .fnserviceContent .publicPage li a.next {
    background: #ffffff;
  }

  .fnserviceContent .publicPage li a.pre:hover,
  .fnserviceContent .publicPage li a.next:hover {
    background: #EA6200;
  }

  .fnserviceContent .itemDiv {
    /* background: #FFF; */
    /* padding: 42px; */
    margin-top: 65px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-bottom: 20px;
  }

  .fnserviceContent .item {
    /* border: 2px solid #CDD1DA; */
    border: 2px solid #fff;
    /* border-radius: 8px;
    overflow: hidden; */
  }

  .fnserviceContent .item img {
    width: 100%;
    height: auto;
  }

  .fnserviceContent .item .text {
    padding: 18px 16px;
    background: #fff;
  }

  .fnserviceContent .item .title {
    color: #181C25;
    font-size: 21px;
    margin-bottom: 8px;
  }

  .fnserviceContent .item .control {
    display: flex;
    align-items: end;
  }

  .fnserviceContent .item .price {
    display: flex;
    width: 60%;
    align-items: baseline;
  }

  .fnserviceContent .item .price h5 {
    color: #DD703F;
    font-size: 24px;
    font-weight: 700;
    letter-spacing: 0.48px;
  }

  .fnserviceContent .item .price span {
    color: #898989;
    font-size: 16px;
    font-weight: 400;
    margin-left: 12px;
    text-decoration: line-through;
  }

  .fnserviceContent .item .buy {
    width: 40%;
    background: #CD5B26;
    color: #FFF;
    font-size: 14px;
    font-weight: 700;
    padding: 12px;
    text-align: center;
    cursor: pointer;
  }

  .fnserviceContent .item .nobuy {
    width: 40%;
    background: #8796A1;
    color: #FFF;
    font-size: 14px;
    font-weight: 700;
    padding: 12px;
    text-align: center;
    cursor: pointer;
  }

  /*pop*/
  .fnservicePop {
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.7);
    width: 100vw;
    height: 100vh;
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99;
    padding: 40px;
  }

  .fnservicePop.active {
    display: flex;
  }

  .fnservicePop .box {
    background: #fff;
    padding: 60px;
    max-width: 1120px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    position: relative;
  }

  .fnservicePop .close {
    position: absolute;
    top: 18px;
    right: 24px;
    width: 36px;
    height: 36px;
    opacity: .3;
    cursor: pointer;
  }

  .fnservicePop img {
    width: 100%;
    height: auto;
  }

  .fnservicePop .title {
    color: #232536;
    font-size: 32px;
    font-weight: 600;
    margin: 25px 0;
  }

  .fnservicePop .text {
    color: #727272;
    font-size: 16px;
    font-weight: 400;
    margin-bottom: 40px;
  }

  .fnservicePop .price {
    display: flex;
    align-items: baseline;
    margin-bottom: 60px;
  }

  .fnservicePop .price h5 {
    color: #DD703F;
    font-size: 24px;
    font-weight: 700;
    letter-spacing: 0.48px;
  }

  .fnservicePop .price span {
    color: #898989;
    font-size: 16px;
    font-weight: 400;
    margin-left: 12px;
    text-decoration: line-through;
  }

  .fnservicePop .control {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .fnservicePop .buy {
    /* width: 100%; */
    background: #CD5B26;
    color: #FFF;
    font-size: 14px;
    font-weight: 700;
    padding: 12px;
    text-align: center;
    cursor: pointer;
  }

  .fnservicePop .nobuy {
    /* width: 40%; */
    background: #8796A1;
    color: #FFF;
    font-size: 14px;
    font-weight: 700;
    padding: 12px;
    text-align: center;
    cursor: pointer;
  }
</style>
@endpush
@endonce
{{-- js --}}
@once
@push('customScript')
<script>
  function fnservice() {
    const buys = document.querySelectorAll('.fnserviceContent .bottomContent .buy')
    const pop = document.querySelector('.fnservicePop')
    const pop_close = pop.querySelector('.close')
    const pop_img = pop.querySelector('img')
    const pop_title = pop.querySelector('.title')
    const pop_text = pop.querySelector('.text')
    const pop_price = pop.querySelector('.price span')
    const pop_offer = pop.querySelector('.price h5')
    const pop_nobuy = pop.querySelector('.nobuy')
    const pop_buy = pop.querySelector('.buy')
    const pop_input = pop.querySelector('input[type="number"]')
    const src = "{{ URL::asset('images/') }}"
    pop_close.addEventListener('click', function() {
      // console.log(`關彈窗`)
      pop.classList.remove('active')
    })
    buys.forEach(item => {
      item.addEventListener('click', function() {
        // console.log(`打開彈窗`)
        pop.classList.add('active')
        pop_img.setAttribute('src', src + '/' + item.dataset.cover)
        pop_title.innerText = item.dataset.title
        pop_text.innerText = item.dataset.text
        pop_price.innerText = '$' + item.dataset.price
        pop_offer.innerText = '$' + item.dataset.offer
        pop_nobuy.dataset.id = item.dataset.id
        pop_buy.dataset.id = item.dataset.id
        pop_input.value = 1 //數量保持1
      })
    })
    pop_nobuy.addEventListener('click', function() {
      // console.log(`加入購物車,${this.dataset.id},${pop_input.value}`)
      car_add({
        obj: 'car',
        array: [this.dataset.id, Number(pop_input.value)]
      })
      // console.log(`car_search:${car_search({obj:'car'})}`)
      pop.classList.remove('active')
      car_number()
    })
    pop_buy.addEventListener('click', function() {
      // console.log(`立即購物車,${this.dataset.id},${pop_input.value}`)
      car_add({
        obj: 'car',
        array: [this.dataset.id, Number(pop_input.value)]
      })
      // console.log(`car_search:${car_search({obj:'car'})}`)
      window.location = "{{ route('fncar') }}";
      pop.classList.remove('active')
      car_number()
    })
    //add number
    quantity();
  }
  // window.onload = fnservice
</script>
@endpush
@endonce
{{-- html --}}
<div class="fnindex_service">
  <div class="fnserviceContent">
    <div class="publicWidth">
      <div class="publicScrollAnimation_bottom topContent">
        <p class="retitle">service items</p>
        <h2 class="title">服務項目</h2>
      </div>
      <div class="bottomContent">
        <div class="publicScrollAnimation itemDiv">
          @foreach ($lists as $list)
          <div class="publicScrollAnimation_bottom item">
            <div class="img">
              <img src="{{ URL::asset('images/'.$list->cover.'?'.rand()) }}" alt="">
            </div>
            <div class="text">
              <div class="title">{{$list->title}}</div>
              <div class="control">
                <div class="price">
                  <h5>${{$list->special_offer}}</h5><span>${{$list->price}}</span>
                </div>
                <div class="buy"
                  data-id="{{$list->id}}"
                  data-cover="{{$list->cover}}"
                  data-title="{{$list->title}}"
                  data-text="{{$list->text}}"
                  data-price="{{$list->price}}"
                  data-offer="{{$list->special_offer}}">立即購買</div>
              </div>
            </div>
          </div>
          @endforeach
          {{--<div class="item">
            <div class="img">
              <img src="{{ URL::asset('images/fnsevice01.png') }}" alt="">
        </div>
        <div class="text">
          <div class="title">法律諮詢 / 時</div>
          <div class="control">
            <div class="price">
              <h5>$1000</h5><span>$1800</span>
            </div>
            <div class="nobuy">立即購買</div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="img">
          <img src="{{ URL::asset('images/fnsevice01.png') }}" alt="">
        </div>
        <div class="text">
          <div class="title">法律諮詢 / 時</div>
          <div class="control">
            <div class="price">
              <h5>$1000</h5><span>$1800</span>
            </div>
            <div class="buy">立即購買</div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="img">
          <img src="{{ URL::asset('images/fnsevice01.png') }}" alt="">
        </div>
        <div class="text">
          <div class="title">法律諮詢 / 時</div>
          <div class="control">
            <div class="price">
              <h5>$1000</h5><span>$1800</span>
            </div>
            <div class="buy">立即購買</div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="img">
          <img src="{{ URL::asset('images/fnsevice01.png') }}" alt="">
        </div>
        <div class="text">
          <div class="title">法律諮詢 / 時</div>
          <div class="control">
            <div class="price">
              <h5>$1000</h5><span>$1800</span>
            </div>
            <div class="buy">立即購買</div>
          </div>
        </div>
      </div>--}}
    </div>
    {{-- @include('layouts.bapage') --}}
  </div>
</div>
</div>
<div class="fnservicePop">
  <div class="box">
    <div class="img">
      {{--<img src="{{ URL::asset('images/fnsevice01.png') }}" alt="">--}}
      <img alt="">
    </div>
    <div class="textDiv">
      {{-- <div class="title">法律諮詢 / 時</div>
        <div class="text">內容敘述內容敘述述內容敘述內容敘述內容敘述內容敘述內容敘述內容敘述內容敘述</div>
        <div class="price">
          <h5>$1000</h5><span>$1800</span>
        </div>--}}
      <div class="title"></div>
      <div class="text"></div>
      <div class="price">
        <h5></h5><span></span>
      </div>
      <div class="control">
        @include('layouts.customNumber')
        <div class="nobuy">加入購物車</div>
        <div class="buy">立即購買</div>
      </div>
    </div>
    <div class="close">
      <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" fill-rule="nonzero" />
      </svg>
    </div>
  </div>
</div>
</div>