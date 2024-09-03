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
    .fnpayContent{
      background: rgba(202, 206, 219, 0.30);
      padding: 80px 0 150px;
    }
    .fnpayContent .topContent{
      text-align: center;
    }
    .fnpayContent .topContent .retitle{
      color: #62678E;
      font-size: 21px;
      font-weight: 500;
    }
    .fnpayContent .topContent .text span{
      color: #CD5B26;
    }
    .fnpayContent .topContent .text{
      color: #62678E;
      font-size: 24px;
      font-weight: 400;
    }
    .fnpayContent .topContent .title{
      color: #282938;
      font-size: 48px;
      font-weight: 600;
    }
    .fnpayContent .bottomContent{
      background: #FFF;
      padding: 80px 70px 30px;
      margin-top: 65px;
    }
    .fnpayContent .bottomContent .titleDiv .title{
      color: #212B36;
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 16px;
    }
    .fnpayContent .bottomContent .titleDiv .title span{
      font-weight: 400;
      margin-left: 15px;
    }
    .fnpayContent .bottomContent .titleDiv .text{
      color: #576C7E;
      font-size: 15px;
      font-weight: 400;
      line-height: 1.6;
    }
    .fnpayContent .bottomContent .titleDiv .text span.blue{
      color: #CD5B26;
    }
    .fnpayContent .bottomContent .titleDiv .text span.orange{
      color: #3056D3;
    }
    .fnpayContent .bottomContent .itemDiv{
      display: grid;
      grid-template-columns: 1fr 180px;
      gap: 60px;
      padding: 40px 0;
      align-items: center;
    } 
    .fnpayContent .bottomContent .itemDiv+.itemDiv{
      border-top: 1px solid #ACB6BE;
    } 
    /* .fnpayContent .bottomContent .leftDiv{
      display: grid;
      grid-template-columns: 1fr 1fr;
      flex-wrap: wrap;
    } */
    .fnpayContent .bottomContent .leftDiv .itemNam{
      color: #ACB6BE;
      font-size: 15px;
      font-weight: 400;
      margin-bottom: 10px;
    } 
    .fnpayContent .bottomContent .leftDiv .itemTop .itemValue{
      color: #576C7E;
      font-size: 15px;
      font-weight: 400;
      padding: 12px 18px;
      border-radius: 5px;
      border: 1px solid #E9EDF4;
    } 
    .fnpayContent .bottomContent .leftDiv .itemTop{
      width: 100%;
      display: flex;
      gap: 10px;
    }
    .fnpayContent .bottomContent .leftDiv .itemTop .item{
      width: 25%;
    }
    .fnpayContent .bottomContent .leftDiv .itemTop .item:last-child{
      width: 50%;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom{
      width: 100%;
      margin-top: 30px;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom .itemValue{
      display: flex;
      align-items: center;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom label{
      color: #ACB6BE;
      width: 140px;
      user-select: none;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom .input select,
    .fnpayContent .bottomContent .leftDiv .itemBottom .input input{
      color: #576C7E;
      font-size: 15px;
      font-weight: 400;
      padding: 12px 18px;
      border-radius: 5px;
      border: 1px solid #E9EDF4;
    }

    .fnpayContent .bottomContent .leftDiv .itemBottom .input{
      margin-left: 10px;
      width: 140px;
      position: relative;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom .input .error{
      position: absolute;
      left: 0;
      bottom: -18px;
      padding: 2px 4px;
      border-radius: 3px;
      background: red;
      color: #fff;
      font-size: 12px;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom .input select,
    .fnpayContent .bottomContent .leftDiv .itemBottom .input input{
      width: 100%;
    }
    .fnpayContent .bottomContent .leftDiv .itemBottom .input+.input{
      width: calc( 100% - 280px);
    }
    .fnpayContent .bottomContent .rightDiv p{
      color: #ACB6BE;
      text-align: center;
      font-size: 16px;
      font-weight: 300;
    }
    .fnpayContent .bottomContent .rightDiv h2{
      display: flex;
      align-items: baseline;
      justify-content: center;
    }
    .fnpayContent .bottomContent .rightDiv h2 p{
      color: #3056D3;
      text-align: center;
      font-size: 30px;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1;
      /* margin-top: 2px; */
    }
    .fnpayContent .bottomContent .rightDiv h2.line p{
      text-decoration: line-through;
    }
    .fnpayContent .bottomContent .rightDiv h2.orange span,
    .fnpayContent .bottomContent .rightDiv h2.orange p{
      color: #CD5B26;
    }
    .fnpayContent .bottomContent .rightDiv h2 span{
      font-size: 21px;
      color: #3056D3;
      margin-right: 5px;
    }
    .fnpayContent .bottomContent .rightDiv a{
      border-radius: 6px;
      background: #3056D3;
      color: #FFF;
      text-align: center;
      font-size: 14px;
      font-weight: 500;
      padding: 12px;
      width: 100%;
      /* margin-bottom: 10px; */
    }
    .fnpayContent .bottomContent .rightDiv a.disabled{
      opacity: .6;
      cursor: auto;
    }
    .fnpayContent .bottomContent .rightDiv small{
      color: #ACB6BE;
      text-align: center;
      font-size: 12px;
      font-weight: 300;
      display: block;
    }
    .fnpayContent .bottomContent .rightDiv .bottom{
      margin-top: 24px;
    }
  </style>
  @endpush
  @endonce
  {{--  html --}}
  <div class="fnpayContent">
    <div class="publicWidth">
      <div class="topContent">
        <p class="retitle">繳費 / 查詢</p>
        <h2 class="title">欠款資訊</h2>
        <p class="text"><span>若無法查詢/繳費，</span>請於上班時間來電06-3222555，由專員為您服務！</p>
      </div>
      <div class="bottomContent">
        <div class="titleDiv">
          <h2 class="title">債務人<span>{{ $datas[0]['PNAME'] }}</span></h2>
          <p class="text"><span class="blue">繳費方式：線上ATM / 實體ATM轉帳 / 電信</span><span class="orange">直營門市</span><span class="blue">繳費 (限亞太、遠傳電信) ，</span>若有其他特殊需求請來電諮詢其他繳費方式！<br>為確保您的權益，<span class="orange">請於繳費完成後來電專員</span>，以利後續回報電信業者帳戶結清。</p>
        </div>
        <!-- <form method="post" id="form"> -->
          @foreach ($datas as $key=>$data)
          <div class="itemDiv">
            <div class="leftDiv">
              <div class="itemTop">
                <div class="item">
                  <div class="itemNam">電信業者</div>
                  <div class="itemValue">{{$data['COMPANY']}}</div>
                </div>
                <div class="item">
                  <div class="itemNam">欠款門號</div>
                  <div class="itemValue">{{$data['PCELL']}}</div>
                </div>
                <div class="item">
                  <div class="itemNam">專屬匯款帳號</div>
                  <div class="itemValue">017兆豐銀行 - {{$data['BANK']}}</div>
                </div>
              </div>
              <div class="itemBottom">
                <div class="item">
                  <div class="itemNam">加購清償證明</div>
                  <div class="itemValue">
                    <label for="product_add{{ $key }}">
                      <input type="checkbox" class='product_add' id='product_add{{ $key }}'  name="product_add">
                      每份NT.100元
                    </label>
                    <div class="input">
                      <!-- <input type="text" placeholder="縣市" class='city' name="city"> -->
                      <select name="city" class='city'>
                        <option value="臺北市">臺北市</option>
                        <option value="基隆市">基隆市</option>
                        <option value="新北市">新北市</option>
                        <option value="連江縣">連江縣</option>
                        <option value="宜蘭縣">宜蘭縣</option>
                        <option value="新竹市">新竹市</option>
                        <option value="新竹縣">新竹縣</option>
                        <option value="桃園市">桃園市</option>
                        <option value="苗栗縣">苗栗縣</option>
                        <option value="臺中市">臺中市</option>
                        <option value="彰化縣">彰化縣</option>
                        <option value="南投縣">南投縣</option>
                        <option value="嘉義市">嘉義市</option>
                        <option value="嘉義縣">嘉義縣</option>
                        <option value="雲林縣">雲林縣</option>
                        <option value="臺南市">臺南市</option>
                        <option value="高雄市">高雄市</option>
                        <option value="南海島">南海島</option>
                        <option value="澎湖縣">澎湖縣</option>
                        <option value="金門縣">金門縣</option>
                        <option value="屏東縣">屏東縣</option>
                        <option value="臺東縣">臺東縣</option>
                        <option value="花蓮縣">花蓮縣</option>
                      </select>
                    </div>
                    <div class="input">
                      <input type="text" placeholder="詳細地址" class='address' name="address">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="rightDiv">
              <div class="top">
                <p>欠款金額</p>
                <h2><span>$</span><p>{{ round($data['OWE_MONEY']) }}</p></h2>
                <!-- PAY_STATUS =='Y' 已繳款 -->
                @if ( $data['PAY_STATUS']=='Y' )
                  <a class="disabled">已繳款</a>
                @elseif( !$data['AGREEMENT'] )
                  <a onclick="amountFn(this)" data-cost="{{ round($data['OWE_MONEY']) }}" data-name="{{ $data['PNAME'] }}" data-phone="{{ $data['PCELL'] }}" data-casenumber="{{ $data['CASE_NO'] }}">線上繳費 </a>
                @endif

                @if ( $data['AGREEMENT'] )
                  <div class="bottom">
                    <p>協商金額</p>
                    <h2 class="orange"><span>$</span><p>{{ round($data['AGREEMENT']) }}</p></h2>
                    @if ( $data['PAY_STATUS']=='Y' )
                      <a>已繳款</a>
                    @else
                      <a onclick="amountFn(this)" data-cost="{{ round($data['AGREEMENT']) }}" data-name="{{ $data['PNAME'] }}" data-phone="{{ $data['PCELL'] }}" data-casenumber="{{ $data['CASE_NO'] }}">線上繳費 </a>
                    @endif
                  </div>
                @endif
              </div>
              {{--<!-- 已繳款 -->
              @if ( $data['PAY_STATUS']=='Y' )
                <div class="top">
                  <p>欠款金額</p>
                  <h2 class="line"><span>$</span><p>{{ round($data['OWE_MONEY']) }}</p></h2>
                  <a>已繳款</a>
                </div>
              @elseif ( $data['AGREEMENT'] )
                <!-- 協商價 -->
                <div class="top">
                  <p>欠款金額</p>
                  <h2 class="line"><span>$</span><p>{{ round($data['OWE_MONEY']) }}</p></h2>
                </div>
                <div class="bottom">
                  <p>協商金額</p>
                  <h2 class="orange"><span>$</span><p>{{ round($data['AGREEMENT']) }}</p></h2>
                  <a onclick="amountFn(this)" data-cost="{{ round($data['AGREEMENT']) }}" data-name="{{ $data['PNAME'] }}" data-phone="{{ $data['PCELL'] }}">線上繳費 </a>
                </div>
              @else
                <div class="top">
                  <p>欠款金額</p>
                  <h2><span>$</span><p>{{ round($data['OWE_MONEY']) }}</p></h2>
                  <a onclick="amountFn(this)" data-cost="{{ round($data['OWE_MONEY']) }}" data-name="{{ $data['PNAME'] }}" data-phone="{{ $data['PCELL'] }}">線上繳費 </a>
                  <!-- <h2><span>$</span> {{$data['OWE_MONEY']}}</h2>
                  <h2><span>$</span> {{$data['AGREEMENT']}}</h2> -->
                  <!-- <small>(請準備讀卡機及金融卡)</small> -->
                </div>
              @endif--}}
            </div>
          </div>
          @endforeach
        <!-- </form> -->
        {{--<div class="itemDiv">
          <div class="leftDiv">
            <div class="item">
              <div class="itemNam">電信業者</div>
              <div class="itemValue">台灣之星</div>
            </div>
            <div class="item">
              <div class="itemNam">欠款門號</div>
              <div class="itemValue">台灣之星</div>
            </div>
            <div class="item">
              <div class="itemNam">直營門市繳費帳號</div>
              <div class="itemValue">0043842903</div>
            </div>
            <div class="item">
              <div class="itemNam">專屬匯款帳號</div>
              <div class="itemValue">017兆豐銀行 - 64022255331086</div>
            </div>
          </div>
          <div class="rightDiv">
            <p>欠款金額</p>
            <h2><span>$</span> 13220</h2>
            <a href="#">線上繳費 </a>
            <small>(請準備讀卡機及金融卡)</small>
          </div>
        </div>--}}
      </div>
    </div>
  </div>
  {{-- 引入fn_footer模板 --}}
  @include('layouts.fn_footer')
  {{-- js --}}
  <script>
    function inputError(itemDiv){
      let inputs = [itemDiv.querySelector('.itemBottom .city'),itemDiv.querySelector('.itemBottom .address')]
      inputs = inputs.map(function(o){
        const input = o.closest('.input')
        const error = input.querySelector('.error')
        if(error){error.remove()}
        if(!o.value){
          input.insertAdjacentHTML('beforeend','<span class="error">不能為空</span>')
          return '';
        }else{
          return o.value;
        }
      })
      if( !inputs.every(el=>!!el) ){
        // console.log('error')
        return false;
      }else{
        return inputs;
      }
    }
    function amountFn(obj){
      const cost = obj.dataset.cost; //當前金額
      const name = obj.dataset.name; 
      const phone = obj.dataset.phone;
      const casenumber = obj.dataset.casenumber; //案號
      // const product = '債務諮商';
      const itemDiv = obj.closest('.itemDiv')
      let url = "{{ route('fnpayments') }}"+"/"+cost+"/"+name+"/"+phone+"/"+casenumber
      if( itemDiv.querySelector('.itemBottom .product_add').checked ){ 
        const inputs = inputError(itemDiv)
        if( inputs ){
          // city = inputs[0];
          // address = inputs[1];
          url = url+"/"+inputs[0]+"/"+inputs[1]
        }else{
          console.log('error')
          return false;
        }
      }
      document.location.href= url
    }
    window.onload = function () {
      navFn();//選單
    }
  </script>
@endsection