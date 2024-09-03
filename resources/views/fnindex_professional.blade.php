@once
@push('customStyle')
<style>
  .fnindex_professional {
    background: rgba(202, 206, 219, 0.30);
    padding: 80px 0;
  }

  .fnindex_professional .topContent {
    display: flex;
    align-items: end;
  }

  .fnindex_professional .topContent .text {
    width: 16px;
    height: 16px;
    background: #666DFF;
    margin-bottom: 16px;
  }

  .fnindex_professional .topContent .title {
    color: #232536;
    font-size: 48px;
    font-weight: 600;
    line-height: 1;
  }

  .fnindex_professional .topContent .textDiv {
    margin-left: 30px;
  }

  .fnindex_professional .topContent .textDiv p {
    color: #62678E;
    font-size: 21px;
    font-weight: 500;
  }

  .fnindex_professional .bottomContent {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-top: 48px;
  }

  .fnindex_professional .bottomContent .item {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    background: #fff;
  }

  .fnindex_professional .bottomContent .textDiv {
    padding: 28px;
  }

  .fnindex_professional .bottomContent .title {
    color: #232536;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 16px;
  }

  .fnindex_professional .bottomContent .text p {
    color: #232536;
    font-size: 18px;
    font-weight: 500;
    opacity: 0.6;
  }

  @media (max-width: 1320px) {
    .fnindex_professional .bottomContent {
      grid-template-columns: repeat(1, 1fr);
    }

    .fnindex_professional .bottomContent .item {
      max-width: 600px;
      margin: auto;
    }
  }

  @media (max-width: 1100px) {
    .fnindex_professional .topContent {
      display: block;
    }

    .fnindex_professional .topContent .textDiv {
      margin-left: 0;
    }
  }

  @media (max-width: 860px) {
    .fnindex_professional .bottomContent .item {
      display: block;
      background: none;
      max-width: 420px;

    }

    .fnindex_professional .bottomContent .textDiv {
      background: #fff;
    }

    .fnindex_professional .bottomContent .item .img {
      max-width: 260px;
    }
  }
</style>
@endpush
@endonce
<div class="fnindex_professional">
  <div class="publicWidth">
    <div class="publicScrollAnimation_bottom topContent">
      <div class="leftContent">
        <p class="text"></p>
        <h2 class="title">專業領域</h2>
      </div>
      <div class="textDiv">
        <p>professional field</p>
      </div>
    </div>
    <div class="bottomContent">
      <div class="publicScrollAnimation_bottom publicImgZoom item">
        <div class="img">
          <img class="publicImg100" src="{{ URL::asset('images/fnindex_professional01.png') }}" alt="">
        </div>
        <div class="textDiv">
          <h4 class="title">強制執行程序辦理</h4>
          <div class="text">
            <p>您的債權有抵押權做擔保嗎?您的債務人有其他財產可供您執行嗎?馨琳揚有完整的強制執行管理系統，且有一流的法務人員幫您執行您的權益!</p>
          </div>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom publicImgZoom item">
        <div class="img">
          <img class="publicImg100" src="{{ URL::asset('images/fnindex_professional02.png') }}" alt="">
        </div>
        <div class="textDiv">
          <h4 class="title">公告登報</h4>
          <div class="text">
            <p>舉凡拍賣公告登報、公示送達登報、民事裁定登報、海外航空版報紙登報、公示催告登報、其他公告(歡迎來電洽詢：02-26417909)</p>
          </div>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom publicImgZoom item">
        <div class="img">
          <img class="publicImg100" src="{{ URL::asset('images/fnindex_professional03.png') }}" alt="">
        </div>
        <div class="textDiv">
          <h4 class="title">逾期應收帳款管理</h4>
          <div class="text">
            <p>您有逾期應收帳款嗎?不要再讓複雜的程序損害您的權益了，馨琳揚有有一流的法務人員幫您執行您的權益!把您的擔保品交給我們來執行吧!</p>
          </div>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom publicImgZoom item">
        <div class="img">
          <img class="publicImg100" src="{{ URL::asset('images/fnindex_professional04.png') }}" alt="">
        </div>
        <div class="textDiv">
          <h4 class="title">電信/信用卡欠款協商</h4>
          <div class="text">
            <p>我們的專業團隊會根據您的具體情況，為您制定一個個人化的協商方案。我們的目標是幫助您減輕負擔，並儘快解決欠款問題。</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>