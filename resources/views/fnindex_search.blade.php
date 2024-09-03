@once
@push('customStyle')
<style>
  .fnindex_search{
    background: #232536;
    padding: 80px 0;
  }
  .fnindex_search .topContent{
    text-align: center;
    margin-bottom: 52px;
  }
  .fnindex_search .topContent .text{
    color: #62678E;
    font-size: 21px;
    font-weight: 500;
  }
  .fnindex_search .topContent .title{
    color: #FFF;
    font-size: 48px;
    font-weight: 600;
  }
  .fnindex_search .searchContent{
    /* margin-top: 52px; */
    background: #666DFF;
    position: relative;
    padding: 70px 20px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .fnindex_search .searchContent .box{
    /* display: grid;
    grid-template-columns: 7fr 5fr 1fr; */
    gap: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 1020px;
  }

  .fnindex_search .searchContent .titleDiv .text p{
    color: #FFF;
    font-size: 14px;
    font-weight: 300;
    letter-spacing: 3px;
    text-transform: uppercase;
  }
  .fnindex_search .searchContent .titleDiv .title span{
    color: #FFF;
    font-size: 32px;
    font-weight: 700;
  }
  .fnindex_search .searchContent .titleDiv .title span+span{
    margin-left: 22px;
  }
  .fnindex_search .searchContent .formContent{
    min-width: 320px;
  }
  .fnindex_search .searchContent .formContent label{
    color: #FFE37E;
    font-size: 16px;
    margin-bottom: 3px;
    display: block;
    font-weight: 200;
  }
  .fnindex_search .searchContent .formContent label span{
    display: none;
  }
  .fnindex_search .searchContent .formContent .input{
    position: relative;
  }
  .fnindex_search .searchContent .formContent .puplicError{
    left: 0;
    bottom: -18px;
  }
  .fnindex_search .searchContent .formContent input{
    background: #FFF;
    padding: 16px;
    color: #232536;
    font-size: 16px;
    font-weight: 500;
    width: 100%;
    border: none;
  }
  .fnindex_search .searchContent .formContent li+li{
    margin-top: 20px;
  }
  .fnindex_search .searchContent .linkDiv{
    display: flex;
    justify-content: center;
  }
  .fnindex_search .searchContent .link{
    width: 90px;
    height: 48px;
    background: rgba(82, 57, 250, 1);
    border-radius: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #fff;
    cursor: pointer;
  }
  .fnindex_search .searchContent .link p{
    font-size: 18px;
    color: #FFF;
    margin-right: 10px;
  }
  .fnindex_search .searchContent .link svg{
    width: 8px;
    height: auto;
  }
  .fnindex_search .searchContent .bg{
    position: absolute;
    top: 0;
    left: 0;
    font-size: 0;
  }
  .fnindex_search .searchContent .bg_line{
    left: auto;
    right: 0;
  }
  .fnindex_search .searchContent .bg_line2{
    display: none;
  }
  .fnindex_search .bottomContent{
    margin-top: 60px;
  }
  .fnindex_search .bottomContent .title{
    color: #232536;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 16px;
  }
  .fnindex_search .bottomContent p{
    color: #FFF;
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 3px;
    text-transform: uppercase;
    text-align: center;
  }
  .fnindex_search .bottomContent .text_yellow{
    color: #FFE99A;
  }
  @media (max-width: 1280px) {
    .fnindex_search .searchContent .box{
  
    }
    .fnindex_search .searchContent .titleDiv .title span{
      font-size: 24px;
    }
    .fnindex_search .searchContent .titleDiv{
      max-width: 380px;
    }
  }
  @media (max-width: 1080px) {
    .fnindex_search .searchContent .box{
      display: block;
    }
    .fnindex_search .searchContent .titleDiv{
      margin-bottom: 40px;
    }
    .fnindex_search .searchContent .formContent{
      margin-bottom: 40px;
    }
    .fnindex_search .searchContent .bg_line{
      display: none;
    }
    .fnindex_search .searchContent .bg_line2{
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
      bottom: 0;
      top: auto;
      width: 100%;
      height: 24px;
    }
    .fnindex_search .searchContent .bg_line2 .blue{
      background: #4F56FF;
    }
    .fnindex_search .searchContent .bg_line2 .pink{
      background: #FFD3AF;
    }
    .fnindex_search .searchContent .bg_line2 .orange{
      background: #FFA155;
    }
    .fnindex_search .bottomContent p+p{
      margin-top: 16px;
    }
  }
  @media (max-width: 680px) {
    .fnindex_search .searchContent .titleDiv .title span{
      margin-right: 30px
    }
    .fnindex_search .searchContent .titleDiv .title span+span{
      margin-left: 0;
    }
    .fnindex_search .searchContent .titleDiv .title{
      max-width: 295px;
    }
    .fnindex_search .topContent .title{
      font-size: 36px;
    }
    .fnindex_search .searchContent{
      margin-top: 36px;
    }
    .fnindex_search .searchContent .formContent{
      min-width: auto;
    }
  }
</style>
@endpush
@endonce
<div class="fnindex_search">
  <div class="publicWidth">
    <div class="topContent">
      <p class="text">電信債償還</p>
      <h2 class="title">快速繳費 / 查詢欠款金額</h2>
    </div>
    <form method="post" action="{{ route('fnsearch') }}">
      @csrf
      <div class="publicScrollAnimation_bottom searchContent">
        <div class="box">
          <div class="titleDiv">
            <div class="text">
              <p>支援線上匯款 / 查詢欠款金額</p>
            </div>
            <div class="title">
              <div class="top">
                <span>遠傳電信</span>
                <span>亞太電信</span>
              </div>
              <div class="bottom">
                <span>台灣之星</span>
                <span>台灣大哥大</span>
                <span>威寶電信</span>
              </div>
            </div>
          </div>
          <!-- <div class="inputDiv"> -->
          <ul class="formContent">
            <li>
              @include('layouts.input',['type'=>'text','id'=>'pid','label'=>'債務人身分證字號','require'=>true,'place'=>'債務人身分證字號'])
              {{-- <input type="text" class="input" placeholder="債務人身分證字號"> --}}
            </li>
            <li>
              @include('layouts.input',['type'=>'text','id'=>'serial','label'=>'信函識別碼','require'=>true,'place'=>'信函識別碼'])
            </li>
            {{--<li>
              @include('layouts.input',['type'=>'date','id'=>'birth','label'=>'債務人出生日','require'=>true,'place'=>'債務人出生日'])
              <input type="text" class="input" placeholder="債務人民國出生年月日 (YYY/MM/DD)">
            </li> --}}
          </ul>
          <!-- </div> -->
          <div class="linkDiv">
            {{--<a href="{{ route('fnpay') }}" class="link">
              <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41412 22L0 18.7805L9.03053 11.0894L0 3.21951L1.41412 0L13 10.374V12.1626L1.41412 22Z" fill="white"/>
              </svg>
            </a>--}}
            <button type='submit' class="link">
              <p>查詢</p>
              <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.41412 22L0 18.7805L9.03053 11.0894L0 3.21951L1.41412 0L13 10.374V12.1626L1.41412 22Z" fill="white"/>
              </svg>
            </button>
          </div>
        </div>
        <div class="bg">
          <svg width="89" height="80" viewBox="0 0 89 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.8474 29.3785V0H88.5875V29.3785H10.8474Z" fill="white" fill-opacity="0.4"/>
            <path d="M0 50.6215V0H61.9209V50.6215H0Z" fill="#FFA155"/>
            <path d="M32.5425 29.3785V0H61.921V29.3785H32.5425Z" fill="#FFD3AF"/>
            <path d="M0 80.0001V50.6216H29.3785V80.0001H0Z" fill="white" fill-opacity="0.4"/>
          </svg>
        </div>
        <div class="bg bg_line">
          <svg width="24" height="333" viewBox="0 0 24 333" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="333" width="333" height="24" transform="rotate(-90 0 333)" fill="#4F56FF"/>
            <rect y="270" width="270" height="24" transform="rotate(-90 0 270)" fill="#FFA155"/>
            <rect y="270" width="195" height="24" transform="rotate(-90 0 270)" fill="#FFD3AF"/>
          </svg>
        </div>
        <div class="bg bg_line2">
          <div class="blue"></div>
          <div class="pink"></div>
          <div class="orange"></div>
        </div>
      </div>
    </form>
    <div class="publicScrollAnimation_bottom bottomContent">
      <div class="textDiv">
        <p>其他繳費方式: 門市現場繳費 (現金)  /  線上轉帳   / 實體atm轉帳 (依欠款單上提供之匯款帳號)</p>
        <p class="text_yellow">電信費用欠費查詢請撥：（06）299-5489   |  信用卡及其它費用欠費查詢請撥：（02）2691-7292</p>
      </div>
    </div>
  </div>
</div>