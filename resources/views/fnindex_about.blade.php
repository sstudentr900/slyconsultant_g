@once
@push('customStyle')
<style>
  .fnindex_about {
    background: #fff;
    padding: 80px 0;
  }

  .fnindex_about .topContent {
    display: flex;
    align-items: end;
  }

  .fnindex_about .topContent .text {
    color: #000;
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 18px;
  }

  .fnindex_about .topContent .title {
    color: #232536;
    font-size: 48px;
    font-weight: 600;
    line-height: 1;
  }

  .fnindex_about .topContent .textDiv {
    margin-left: 40px;
  }

  .fnindex_about .topContent .textDiv p {
    color: #5D5F6D;
    font-size: 16px;
    font-weight: 400;
  }

  .fnindex_about .imgContent {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-top: 42px;
  }

  .fnindex_about .imgContent .img {
    position: relative;
  }

  .fnindex_about .imgContent .bg {
    position: absolute;
    top: 0;
    right: 0;
  }

  .fnindex_about .bottomContent {
    margin-top: 48px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-row-gap: 40px;
  }

  .fnindex_about .bottomContent .ling {
    position: relative;
    margin-bottom: 24px;
    text-align: center;
  }

  .fnindex_about .bottomContent .ling svg {
    position: relative;
    z-index: 2;
  }

  .fnindex_about .bottomContent .ling::before {
    content: '';
    position: absolute;
    left: 0;
    top: 15px;
    width: 100%;
    height: 1px;
    border: 1px dashed rgba(247, 122, 64, .4);
    z-index: 1;
  }

  .fnindex_about .bottomContent .title {
    color: #232536;
    font-size: 36px;
    font-weight: 600;
    text-align: center;
  }

  .fnindex_about .bottomContent .textDiv p {
    color: #000;
    font-size: 16px;
    font-weight: 400;
    text-align: center;
  }

  @media (max-width: 1100px) {
    .fnindex_about .topContent {
      display: block;
    }

    .fnindex_about .topContent .textDiv {
      margin-left: 0;
      margin-top: 24px;
    }

    .fnindex_about .topContent .textDiv p {
      margin-top: 16px;
    }
  }

  @media (max-width: 1080px) {
    .fnindex_about .imgContent {
      gap: 3px;
    }

    .fnindex_about .bottomContent {
      grid-template-columns: repeat(2, 1fr);
    }

    .fnindex_about .bottomContent .title {
      font-size: 28px;
    }

    .fnindex_about .bottomContent .title,
    .fnindex_about .bottomContent .textDiv {
      padding: 0 12px;
    }
  }
</style>
@endpush
@endonce
<div class="fnindex_about">
  <div class="publicWidth">
    <div class="publicScrollAnimation_bottom topContent">
      <div class="leftContent">
        <p class="text">ABOUT US</p>
        <h2 class="title">關於馨琳揚</h2>
      </div>
      <div class="textDiv">
        <p>您有法律相關問題嗎?　您有標購法拍屋的需求?您有要公告刊登嗎?　退稅申辦的流程不了解嗎?</p>
        <p>不要再讓複雜的程序損害您的權益了，馨琳揚有多年經驗，且有一流的法務人員幫您執行您的權益!</p>
      </div>
    </div>
    <div class="publicScrollAnimation_bottom imgContent">
      <div class="img"><img class="publicImg100" src="{{ URL::asset('images/fnindex_about01.png') }}" alt=""></div>
      <div class="img"><img class="publicImg100" src="{{ URL::asset('images/fnindex_about02.png') }}" alt=""></div>
      <div class="img"><img class="publicImg100" src="{{ URL::asset('images/fnindex_about03.png') }}" alt=""></div>
    </div>
    <div class="bottomContent">
      <div class="publicScrollAnimation_bottom item">
        <div class="titleDiv">
          <h4 class="title">民國81年</h4>
          <div class="ling">
            <svg width="70" height="6" viewBox="0 0 70 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="0.219482" width="69.365" height="5.78045" fill="#444CFC" />
              <rect x="10.0215" y="0.219482" width="59.3411" height="5.78045" fill="#FFA155" />
              <rect x="9.68237" y="0.219482" width="43.0111" height="5.77145" fill="#FFD3AF" />
            </svg>
          </div>
        </div>
        <div class="textDiv">
          <p>『馨琳揚企業有限公司』創立</p>
          <p>當時資本額為新台幣伍佰萬元整。</p>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom item">
        <div class="titleDiv">
          <h4 class="title">民國85年</h4>
          <div class="ling">
            <svg width="70" height="6" viewBox="0 0 70 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="0.219482" width="69.365" height="5.78045" fill="#444CFC" />
              <rect x="10.0215" y="0.219482" width="59.3411" height="5.78045" fill="#FFA155" />
              <rect x="9.68237" y="0.219482" width="43.0111" height="5.77145" fill="#FFD3AF" />
            </svg>
          </div>
        </div>
        <div class="textDiv">
          <p>『馨琳揚廣告社』成立</p>
          <p>主要業務：法院公告刊登、民事裁定刊登、</p>
          <p>公示送達刊登、債權讓與公告刊登..等</p>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom item">
        <div class="titleDiv">
          <h4 class="title">民國88年</h4>
          <div class="ling">
            <svg width="70" height="6" viewBox="0 0 70 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="0.219482" width="69.365" height="5.78045" fill="#444CFC" />
              <rect x="10.0215" y="0.219482" width="59.3411" height="5.78045" fill="#FFA155" />
              <rect x="9.68237" y="0.219482" width="43.0111" height="5.77145" fill="#FFD3AF" />
            </svg>
          </div>
        </div>
        <div class="textDiv">
          <p>『馨琳揚企管顧問有限公司』改制</p>
          <p>主要業務：逾期應收帳款管理、強制</p>
          <p>執行程序辦理、NPL不良債權買賣、債權</p>
          <p>買賣、讓與辦理。</p>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom item">
        <div class="titleDiv">
          <h4 class="title">民國92年</h4>
          <div class="ling">
            <svg width="70" height="6" viewBox="0 0 70 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="0.219482" width="69.365" height="5.78045" fill="#444CFC" />
              <rect x="10.0215" y="0.219482" width="59.3411" height="5.78045" fill="#FFA155" />
              <rect x="9.68237" y="0.219482" width="43.0111" height="5.77145" fill="#FFD3AF" />
            </svg>
          </div>
        </div>
        <div class="textDiv">
          <p>『馨琳揚地政士事務所』及</p>
          <p>『馨琳揚中區地政士事務所』成立</p>
          <p>大宗抵押權移轉登記、債權人代辦繼承</p>
          <p>登記、抵押權設定登記等業務。</p>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom item">
        <div class="titleDiv">
          <h4 class="title">民國99年</h4>
          <div class="ling">
            <svg width="70" height="6" viewBox="0 0 70 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="0.219482" width="69.365" height="5.78045" fill="#444CFC" />
              <rect x="10.0215" y="0.219482" width="59.3411" height="5.78045" fill="#FFA155" />
              <rect x="9.68237" y="0.219482" width="43.0111" height="5.77145" fill="#FFD3AF" />
            </svg>
          </div>
        </div>
        <div class="textDiv">
          <p>『成大地政士事務所』改制</p>
          <p>債權人代辦繼承登記、抵押權設定登</p>
          <p>記、所有權移轉登記、地政事務業務</p>
          <p>代理與退稅申辦及其他地政士業務。</p>
        </div>
      </div>
      <div class="publicScrollAnimation_bottom item">
        <div class="titleDiv">
          <h4 class="title">民國105年</h4>
          <div class="ling">
            <svg width="70" height="6" viewBox="0 0 70 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="0.219482" width="69.365" height="5.78045" fill="#444CFC" />
              <rect x="10.0215" y="0.219482" width="59.3411" height="5.78045" fill="#FFA155" />
              <rect x="9.68237" y="0.219482" width="43.0111" height="5.77145" fill="#FFD3AF" />
            </svg>
          </div>
        </div>
        <div class="textDiv">
          <p>承接各大電信業者(遠傳/</p>
          <p>台哥大/威寶/台灣之星/亞太..等)</p>
          <p>協助電信債權處理</p>
        </div>
      </div>
    </div>
  </div>
</div>