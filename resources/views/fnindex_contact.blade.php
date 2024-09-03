@once
@push('customStyle')
<style>
  .fnindex_contact {
    background: linear-gradient(to bottom, #D3DAE7 40%, #fff 40%);
    padding: 120px 0px 100px;
    overflow: hidden;
  }

  .fnindex_contact .publicWidth {
    display: grid;
    grid-template-columns: 1fr 470px;
    gap: 20px;
    align-items: center;
  }

  .fnindex_contact .titleDiv {
    margin-bottom: 150px;
  }

  .fnindex_contact .titleDiv .text {
    color: #62678E;
    font-size: 21px;
    font-weight: 600;
  }

  .fnindex_contact .titleDiv .title {
    color: #000;
    font-size: 48px;
    font-weight: 600;
  }

  .fnindex_contact .leftContent .itemDiv {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
  }

  .fnindex_contact .leftContent .itemDiv .item {
    display: flex;
  }

  .fnindex_contact .leftContent .itemDiv .icon {
    padding-top: 12px;
  }

  .fnindex_contact .leftContent .itemDiv .textDiv {
    margin-left: 22px;
  }

  .fnindex_contact .leftContent .itemDiv .textDiv p {
    color: #212B36;
    font-size: 18px;
    font-weight: 600;
  }

  .fnindex_contact .leftContent .itemDiv .textDiv h4 {
    color: #282938;
    font-size: 24px;
    font-weight: 600;
  }

  .fnindex_contact .leftContent .itemDiv .textDiv h6 {
    color: #637381;
    font-size: 16px;
    font-weight: 300;
    margin-top: 10px;
  }

  .fnindex_contact .rightContent .titleDiv {
    display: none;
  }

  .fnindex_contact .rightContent .box {
    padding: 60px;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0px 4px 28px 0px rgba(0, 0, 0, 0.05);
  }

  .fnindex_contact .rightContent .formTitle {
    color: #000;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 32px;
  }

  .fnindex_contact .rightContent li>.inputDiv {
    display: flex;
    justify-content: space-between;
  }

  .fnindex_contact .rightContent li>.inputDiv label,
  .fnindex_contact .rightContent li>label {
    color: #637381;
    font-size: 13px;
    font-weight: 400;
    margin-bottom: 10px;
    display: block;
  }

  .fnindex_contact .rightContent li>.inputDiv .input,
  .fnindex_contact .rightContent li>.input {
    background: #fff;
    border-bottom: 1px solid rgba(241, 241, 241, 1);
    position: relative;
  }

  .fnindex_contact .rightContent textarea,
  .fnindex_contact .rightContent input {
    border: none;
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
  }

  .fnindex_contact .rightContent li+li {
    margin-top: 25px;
  }

  .fnindex_contact .rightContent .btn {
    border-radius: 5px;
    background: #3056D3;
    color: #fff;
    padding: 12px 40px;
    max-width: 120px;
    border: none;
    cursor: pointer;
  }

  .fnindex_contact .rightContent .puplicError {
    bottom: -22px;
  }

  @media (max-width: 1260px) {
    .fnindex_contact {
      background: none;
      padding: 0;
    }

    .fnindex_contact .publicWidth {
      display: flex;
      flex-wrap: wrap;
      flex-direction: column-reverse;
      max-width: 100%;
      padding: 0;
    }

    .fnindex_contact .leftContent {
      padding: 60px 30px;
    }

    .fnindex_contact .leftContent .titleDiv {
      display: none;
    }

    .fnindex_contact .leftContent .itemDiv {
      max-width: 680px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
    }

    .fnindex_contact .leftContent .itemDiv .item {
      min-width: 310px;
    }

    .fnindex_contact .rightContent,
    .fnindex_contact .leftContent {
      width: 100%;
    }

    .fnindex_contact .rightContent {
      background: #D3DAE7;
      padding: 60px 20px;
    }

    .fnindex_contact .rightContent .titleDiv,
    .fnindex_contact .rightContent .box {
      max-width: 470px;
      margin: auto;
    }

    .fnindex_contact .rightContent .titleDiv {
      display: block;
      margin-bottom: 40px;
    }
  }

  @media (max-width: 820px) {
    .fnindex_contact .leftContent .itemDiv {
      max-width: 470px;
      margin: auto;
    }
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<!-- <script></script> -->
@endpush
@endonce
<div class="fnindex_contact">
  <div class="publicWidth">
    <div class="leftContent">
      <div class="publicScrollAnimation_bottom titleDiv">
        <p class="text">CONTACT US</p>
        <h2 class="title">聯絡我們</h2>
      </div>
      <div class="publicScrollAnimation_bottom itemDiv">
        <div class="item">
          <div class="icon">
            <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M26.3043 1.3032C23.8268 -0.594891 21.0721 0.699319 20.16 1.78397L16.9678 5.58026C16.9222 5.63449 16.9222 5.63449 16.9222 5.63449C15.6625 7.35268 15.3791 9.89173 17.5484 11.7159L18.85 12.8104C17.345 14.6 13.8792 18.7217 12.3742 20.5114L11.0727 19.4169C8.90335 17.5928 6.45059 18.3077 4.97401 19.8435L4.92841 19.8977L1.78176 23.6397C0.869686 24.7244 0.0673338 27.6603 2.36236 29.7754C2.52506 29.9122 3.12162 30.4138 3.66395 30.8698C4.09781 31.2347 4.47744 31.5539 4.53167 31.5995C4.5859 31.6451 4.64014 31.6907 4.64014 31.6907C6.29546 32.8049 7.99885 33.3115 9.7503 33.2104L9.85014 33.2018C12.2376 32.8948 14.3107 31.8607 15.7935 30.9782C20.2589 28.5303 24.0897 23.9747 24.2721 23.7578C26.9084 20.5125 28.3702 18.2236 29.885 14.2203C30.5086 12.7079 31.1717 10.4881 31.0644 8.08339L31.0558 7.98356C30.8549 6.24074 30.0636 4.64952 28.6819 3.20993C28.6276 3.16432 28.5734 3.11872 28.5734 3.11872C28.4649 3.02751 28.1395 2.75389 27.7057 2.38906C27.172 2.03286 26.5212 1.48562 26.3043 1.3032ZM28.6141 8.24489C28.6783 10.1504 28.1347 12.0079 27.6109 13.5116C26.2699 17.1981 24.9364 19.2245 22.3912 22.3613C22.2088 22.5783 18.5975 26.7628 14.6139 28.9679C13.2223 29.7419 11.5399 30.6417 9.59743 30.8599C8.445 30.9092 7.25805 30.5592 6.13643 29.8012C5.97373 29.6644 5.70257 29.4364 5.2687 29.0715C4.72638 28.6155 4.12982 28.1139 3.96712 27.9771C2.76537 26.8739 3.49749 25.4528 3.6343 25.2901L6.78095 21.548C7.29122 21.0513 8.23781 20.366 9.43092 21.3693L11.6545 23.239C12.0883 23.6039 12.6417 23.6063 13.1237 23.3635C13.5057 23.1293 21.4864 13.6386 21.6515 13.222C21.8623 12.7512 21.7107 12.1608 21.2768 11.7959L19.0533 9.9262C17.8602 8.92292 18.3729 7.87278 18.7747 7.28485L21.9213 3.5428C22.0582 3.3801 23.3326 2.415 24.6256 3.40965C24.7883 3.54646 25.3848 4.0481 25.9271 4.50413C26.361 4.86896 26.5779 5.05138 26.7406 5.18819C27.9165 5.9918 28.465 7.10108 28.6141 8.24489Z" fill="#3056D3" />
            </svg>
          </div>
          <div class="textDiv">
            <p>Telecom fee arrears</p>
            <h4>電信費用欠費查詢</h4>
            <h6>(06) 299-5489</h6>
          </div>
        </div>
        <div class="item">
          <div class="icon">
            <svg width="28" height="19" viewBox="0 0 28 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M25.3636 0H2.63636C1.18182 0 0 1.16785 0 2.6052V16.3948C0 17.8321 1.18182 19 2.63636 19H25.3636C26.8182 19 28 17.8321 28 16.3948V2.6052C28 1.16785 26.8182 0 25.3636 0ZM25.3636 1.5721C25.5909 1.5721 25.7727 1.61702 25.9545 1.75177L14.6364 8.53428C14.2273 8.75887 13.7727 8.75887 13.3636 8.53428L2.04545 1.75177C2.22727 1.66194 2.40909 1.5721 2.63636 1.5721H25.3636ZM25.3636 17.383H2.63636C2.09091 17.383 1.59091 16.9338 1.59091 16.3499V3.32388L12.5 9.8818C12.9545 10.1513 13.4545 10.2861 13.9545 10.2861C14.4545 10.2861 14.9545 10.1513 15.4091 9.8818L26.3182 3.32388V16.3499C26.4091 16.9338 25.9091 17.383 25.3636 17.383Z" fill="#3056D3" />
            </svg>
          </div>
          <div class="textDiv">
            <p>Mail</p>
            <h4>客服信箱</h4>
            <h6>service@sly-ha.com.tw</h6>
          </div>
        </div>
        <div class="item">
          <div class="icon">
            <svg width="29" height="23" viewBox="0 0 29 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M29 2.65385C29 1.18892 27.5009 0 25.6538 0H3.34615C1.49908 0 0 1.18892 0 2.65385V20.3462C0 21.8111 1.49908 23 3.34615 23H25.6538C27.5009 23 29 21.8111 29 20.3462V2.65385ZM26.7692 2.65385V20.3462C26.7692 20.8345 26.2695 21.2308 25.6538 21.2308H3.34615C2.73046 21.2308 2.23077 20.8345 2.23077 20.3462V2.65385C2.23077 2.16554 2.73046 1.76923 3.34615 1.76923H25.6538C26.2695 1.76923 26.7692 2.16554 26.7692 2.65385Z" fill="#3056D3" />
              <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3846 11.0577C13.3846 9.83692 12.1354 8.84615 10.5962 8.84615H7.25C5.71077 8.84615 4.46154 9.83692 4.46154 11.0577V17.25C4.46154 18.4708 5.71077 19.4615 7.25 19.4615H10.5962C12.1354 19.4615 13.3846 18.4708 13.3846 17.25V11.0577ZM11.1538 11.0577V17.25C11.1538 17.4942 10.904 17.6923 10.5962 17.6923H7.25C6.94215 17.6923 6.69231 17.4942 6.69231 17.25V11.0577C6.69231 10.8135 6.94215 10.6154 7.25 10.6154H10.5962C10.904 10.6154 11.1538 10.8135 11.1538 11.0577ZM16.7308 11.5H23.4231C24.0388 11.5 24.5385 11.1037 24.5385 10.6154C24.5385 10.1271 24.0388 9.73077 23.4231 9.73077H16.7308C16.1151 9.73077 15.6154 10.1271 15.6154 10.6154C15.6154 11.1037 16.1151 11.5 16.7308 11.5ZM16.7308 15.0385H23.4231C24.0388 15.0385 24.5385 14.6422 24.5385 14.1538C24.5385 13.6655 24.0388 13.2692 23.4231 13.2692H16.7308C16.1151 13.2692 15.6154 13.6655 15.6154 14.1538C15.6154 14.6422 16.1151 15.0385 16.7308 15.0385ZM16.7308 18.5769H23.4231C24.0388 18.5769 24.5385 18.1806 24.5385 17.6923C24.5385 17.204 24.0388 16.8077 23.4231 16.8077H16.7308C16.1151 16.8077 15.6154 17.204 15.6154 17.6923C15.6154 18.1806 16.1151 18.5769 16.7308 18.5769ZM1.11538 7.07692H27.8846C28.5003 7.07692 29 6.68062 29 6.19231C29 5.704 28.5003 5.30769 27.8846 5.30769H1.11538C0.499692 5.30769 0 5.704 0 6.19231C0 6.68062 0.499692 7.07692 1.11538 7.07692Z" fill="#3056D3" />
            </svg>
          </div>
          <div class="textDiv">
            <p>Credit card and other arrears</p>
            <h4>信用卡及其它欠費查詢</h4>
            <h6>(02) 2691-7292</h6>
          </div>
        </div>
        <div class="item">
          <div class="icon">
            <svg width="28" height="34" viewBox="0 0 28 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.8359 0C6.23438 0 0 6.01562 0 13.3437C0 19.1953 8.36719 28.875 11.9766 32.8125C12.4688 33.3594 13.125 33.6328 13.8359 33.6328C14.5469 33.6328 15.2031 33.3594 15.6953 32.8125C19.3047 28.9297 27.6719 19.1953 27.6719 13.3437C27.6719 5.96094 21.4375 0 13.8359 0ZM14.2734 31.5C14 31.7734 13.6172 31.7734 13.3984 31.5C10.7188 28.6016 1.91406 18.6484 1.91406 13.3437C1.91406 7 7.27344 1.91406 13.8359 1.91406C20.3984 1.91406 25.7578 7.05469 25.7578 13.3437C25.7578 18.6484 16.9531 28.5469 14.2734 31.5Z" fill="#3056D3" />
              <path d="M13.8359 7.875C10.6094 7.875 7.92969 10.5 7.92969 13.7812C7.92969 17.0078 10.5547 19.6875 13.8359 19.6875C17.1172 19.6875 19.7422 17.0625 19.7422 13.7812C19.7422 10.5 17.0625 7.875 13.8359 7.875ZM13.8359 17.7188C11.6484 17.7188 9.84375 15.9141 9.84375 13.7266C9.84375 11.5391 11.6484 9.73437 13.8359 9.73437C16.0234 9.73437 17.8281 11.5391 17.8281 13.7266C17.8281 15.9141 16.0234 17.7188 13.8359 17.7188Z" fill="#3056D3" />
            </svg>
          </div>
          <div class="textDiv">
            <p>Our Location</p>
            <h4>繳費門市地點</h4>
            <h6>臺南市安平區健康二街519號</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="rightContent">
      <div class="publicScrollAnimation_right titleDiv">
        <p class="text">CONTACT US</p>
        <h2 class="title">聯絡我們</h2>
      </div>
      <div class="publicScrollAnimation_right box">
        <form method="post" action="{{ route('fnconsult') }}">
          <h2 class="formTitle">我要諮詢</h2>
          @csrf
          <ul class="formContent">
            <li>
              @include('layouts.input',['type'=>'text','id'=>'name','label'=>'姓名','require'=>true])
            </li>
            <li>
              @include('layouts.input',['type'=>'email','id'=>'email','label'=>'信箱','require'=>true])
            </li>
            <li>
              @include('layouts.input',['type'=>'tel','id'=>'phone','label'=>'連絡電話','require'=>true])
            </li>
            <li>
              @include('layouts.input',['type'=>'textarea','id'=>'textarea','label'=>'詢問內容','require'=>true])
            </li>
            <li>
              @include('layouts.input',['type'=>'captcha','id'=>'captcha','label'=>'驗證碼','require'=>true])
            </li>
            <li>
              <button type='submit' class="btn">Send</button>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>