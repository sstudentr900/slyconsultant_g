@once
@push('customStyle')
<style>
  .fnindex_header {
    background: #232536;
    padding: 80px 0;
    overflow: hidden;
  }

  .fnindex_header .top {
    /* display: grid; */
    /* grid-template-columns: repeat(2,1fr); */
    display: flex;
    gap: 36px;
  }

  .fnindex_header .top .img {
    flex: 1 1;
  }

  .fnindex_header .top img {
    width: 100%;
    height: auto;
  }

  .fnindex_header .top .textDiv {
    /* width: 1140px; */
    flex: 0 0 575px;
  }

  .fnindex_header .top .icon {
    background: rgba(255, 255, 255, 0.06);
    width: 24px;
    height: 24px;
  }

  .fnindex_header .top .title {
    color: #FFF;
    font-size: 82px;
    font-weight: 400;
    line-height: 1;
    margin-top: 32px;
  }

  .fnindex_header .top .title span {
    color: #F77A40;
    font-size: 100px;
    display: block;
    text-transform: uppercase;
    font-weight: 900;
  }

  .fnindex_header .top .text {
    color: #FFF;
    font-size: 42px;
    font-weight: 400;
    margin-top: 40px;
  }

  .fnindex_header .top .text_yellow {
    color: #FCB594;
    font-size: 24px;
    font-weight: 400;
  }

  .fnindex_header .top .link a {
    width: 260px;
    position: relative;
    background: #CD5B26;
    padding: 20px;
    margin-top: 80px;
  }

  .fnindex_header .top .link .bg {
    position: absolute;
    top: 0;
    left: 0;
  }

  .fnindex_header .top .link p {
    display: flex;
    color: #FFF;
    font-size: 24px;
    align-items: center;
    justify-content: center;
  }

  .fnindex_header .top .link p svg {
    margin-left: 5px;
    margin-top: 5px;
  }

  .fnindex_header .top .question {
    width: 260px;
    color: #FFF7DA;
    text-align: center;
    font-size: 18px;
    font-weight: 300;
    margin-top: 20px;
  }

  .fnindex_header .top .img {
    position: relative;
  }

  .fnindex_header .top .bg {
    position: absolute;
    left: -16px;
    bottom: 0;
    font-size: 0;
  }

  .fnindex_header .bottom {
    /* display: grid;
    grid-template-columns: 1fr 3fr;
    gap: 20px; */
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-top: 60px;
    border: 1px solid rgba(215, 228, 249, 0.50);
    padding: 12px;
    /* justify-items: center; */
  }

  .fnindex_header .bottom .title p {
    color: #FFF;
    font-size: 18px;
    font-weight: 500;
    opacity: 0.6;
  }

  .fnindex_header .bottom .title h4 {
    color: #FFF;
    font-size: 24px;
    font-weight: 500;
  }

  .fnindex_header .bottom .text {
    display: flex;
    margin-left: 30px;
  }

  .fnindex_header .bottom .text h3 {
    color: #72737F;
    font-size: 32px;
    font-weight: 700;
    margin-left: 20px;
  }

  @media (max-width: 1280px) {
    .fnindex_header .top .textDiv {
      flex: 0 0 505px;
    }

    .fnindex_header .top .title span {
      font-size: 80px;
    }

    .fnindex_header .top .title {
      font-size: 72px;
    }

    .fnindex_header .top .title span {
      font-size: 68px;
    }

    .fnindex_header .top .text {
      font-size: 38px;
      margin-top: 24px;
    }

    .fnindex_header .top .text_yellow {
      font-size: 22px;
    }

    .fnindex_header .top .link a {
      margin-top: 40px;
    }

    .fnindex_header .bottom .text h3 {
      font-size: 26px;
    }

  }

  @media (max-width: 1080px) {
    .fnindex_header .top .textDiv {
      flex: 0 0 410px;
    }

    .fnindex_header .top .title {
      font-size: 58px;
    }

    .fnindex_header .top .text {
      font-size: 36px;
      margin-top: 24px;
    }

    .fnindex_header .top .text_yellow {
      font-size: 18px;
    }

    .fnindex_header .top .question {
      margin-top: 10px
    }

    .fnindex_header .top .title {
      margin-top: 24px;
    }

    .fnindex_header .bottom .text h3 {
      font-size: 22px;
    }
  }

  @media (max-width: 980px) {
    .fnindex_header {
      padding-top: 60px;
    }

    .fnindex_header .top {
      display: block
    }

    .fnindex_header .top .textDiv {
      max-width: 600px;
      margin: 0 auto 60px;
    }

    .fnindex_header .top .textDiv {
      margin-bottom: 40px
    }

    .fnindex_header .top .img {
      max-width: 600px;
      margin: auto;
    }
  }

  @media (max-width: 980px) {

    /* .fnindex_header .top .title{
      font-size: 52px;
    }
    .fnindex_header .top .title span{
      font-size: 60px;
    } */
    .fnindex_header .bottom {
      display: block;
      text-align: center;
      padding: 24px;
      max-width: 600px;
      margin: 60px auto 0;
    }

    .fnindex_header .bottom .title {
      text-align: left;
    }

    .fnindex_header .bottom .text {
      margin-left: 0;
      display: flex;
      flex-wrap: wrap;
      margin-top: 16px;
      /* max-width: 240px; */
    }

    .fnindex_header .bottom .text h3 {
      font-size: 21px;
      margin-left: 0;
      width: 124px;
      text-align: left;
    }
  }

  @media (max-width: 480px) {
    .fnindex_header {
      padding-top: 42px;
    }

    .fnindex_header .top .title {
      font-size: 42px;
    }

    .fnindex_header .top .text {
      font-size: 28px;
      margin-top: 0;
    }

    .fnindex_header .top .text_yellow {
      font-size: 16px
    }
  }
</style>
@endpush
@endonce
<div class="fnindex_header">
  <div class="publicWidth">
    <div class="top">
      <div class="publicScrollAnimation_left textDiv">
        <div class="icon"></div>
        <h2 class="title"><span>sly</span>馨琳揚企管顧問</h2>
        <p class="text">想理財 先還款!</p>
        <p class="text_yellow">馨琳揚協助您妥善處理債務 快速找回好信用</p>
        <div class="link">
          <a data-link="fnindex_service">
            <div class="bg">
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11.7148V0.307343H28V11.7148H0Z" fill="#666DFF" />
                <path d="M0 28.3073V20.011H7.72414V28.3073H0Z" fill="#666DFF" />
                <path d="M0 20.011V0.307343H18.3448V20.011H0Z" fill="#FFA155" />
                <path d="M7.72412 11.7148V0.307343H18.3448V11.7148H7.72412Z" fill="#FFD3AF" />
              </svg>
            </div>
            <p>
              我想諮詢
              <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.870229 14L0 11.9512L5.55725 7.05691L0 2.04878L0.870229 0L8 6.60163V7.73984L0.870229 14Z" fill="white" />
              </svg>
            </p>
          </a>
        </div>
        <!-- <a href="{{route('fnqa')}}" class="question">《常見問題請點我》</a> -->
      </div>
      <div class="publicScrollAnimation_right img">
        <!-- <div class="bg">
          <svg width="16" height="101" viewBox="0 0 16 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="100.245" width="99.5086" height="16" transform="rotate(-90 0 100.245)" fill="#444CFC"/>
            <rect y="85.8639" width="85.1287" height="16" transform="rotate(-90 0 85.8639)" fill="#FFA155"/>
            <rect y="86.3572" width="61.7022" height="15.9751" transform="rotate(-90 0 86.3572)" fill="#FFD3AF"/>
          </svg>
        </div> -->
        <img src="{{ URL::asset('images/fnindex_header01.png')}}" alt="">
      </div>
    </div>
    <div class="publicScrollAnimation bottom">
      <div class="title">
        <p>Our Clients</p>
        <h4>We've Worked with</h4>
      </div>
      <div class="text">
        <h3>遠傳電信</h3>
        <h3>亞太電信</h3>
        <h3>台灣之星</h3>
        <h3>台灣大哥大</h3>
        <h3>威寶電信</h3>
      </div>
    </div>
  </div>
</div>