@once
@push('customStyle')
<style>
  .fn_qa {
    background: rgba(202, 206, 219, 0.30);
    padding: 80px 0;
  }

  .fn_qa .topContent {
    text-align: center;
  }

  .fn_qa .topContent .text {
    color: #62678E;
    font-size: 21px;
    font-weight: 500;
  }

  .fn_qa .topContent .title {
    color: #282938;
    font-size: 48px;
    font-weight: 600;
  }

  .fn_qa .topContent .link {
    color: #CD5B26;
    font-size: 24px;
    font-weight: 500;
    margin-top: 12px;
  }

  .fn_qa .bottomContent {
    margin-top: 58px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
  }

  .fn_qa .bottomContent .item {
    padding: 35px 30px 30px;
    background: #fff;
  }

  .fn_qa .bottomContent .titleDiv {
    display: flex;
    margin-bottom: 24px;
  }

  .fn_qa .bottomContent .titleDiv svg {
    /* width: 32px; */
    flex: 0 0 22px;
  }

  .fn_qa .bottomContent .title {
    color: #282938;
    font-size: 24px;
    font-weight: 600;
    margin-left: 20px;
  }

  .fn_qa .bottomContent .textDiv p {
    color: #282938;
    font-size: 18px;
    font-weight: 300;
    opacity: 0.6;
  }

  .fn_qa .publicPage {
    margin-top: 40px;
  }

  .fn_qa .publicPage li a.pre,
  .fn_qa .publicPage li a.next {
    background: #dfdfdf;
  }

  @media (max-width: 1200px) {
    .fn_qa .bottomContent {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 860px) {
    .fn_qa .bottomContent {
      grid-template-columns: repeat(1, 1fr);
    }
  }
</style>
@endpush
@endonce
<div class="fn_qa">
  <div class="publicWidth">
    <div class="publicScrollAnimation_bottom topContent">
      <p class="text">熱門問題</p>
      <h2 class="title">常見問題 FAQs</h2>
      {{--@if(isset($src))
        <a href="{{ route($src) }}" class="link">.... 查看更多問題</a>
      @endif--}}
    </div>
    <div class="bottomContent">
      @foreach ($qaList as $list)
      <div class="publicScrollAnimation_bottom item" id="ga{{ $list->id }}">
        <div class="titleDiv">
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 0C7.21187 0 0 7.21187 0 16C0 24.7881 7.21187 32 16 32C24.7881 32 32 24.7881 32 16C32 7.21187 24.7881 0 16 0ZM14.0637 23.2775L7.05713 16.271L9.7085 13.6196L14.1864 18.0975L23.1759 9.9255L25.6991 12.6996L14.0637 23.2775Z" fill="#62678E" />
          </svg>
          <h4 class="title">{{ $list->title }}</h4>
        </div>
        <div class="textDiv">
          <p>{{ $list->text }}</p>
        </div>
      </div>
      @endforeach
      {{--<div class="item">
        <div class="titleDiv">
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 0C7.21187 0 0 7.21187 0 16C0 24.7881 7.21187 32 16 32C24.7881 32 32 24.7881 32 16C32 7.21187 24.7881 0 16 0ZM14.0637 23.2775L7.05713 16.271L9.7085 13.6196L14.1864 18.0975L23.1759 9.9255L25.6991 12.6996L14.0637 23.2775Z" fill="#62678E"/>
          </svg>
          <h4 class="title">收到欠費通知，我怎麼知道是不是詐騙?</h4>
        </div>
        <div class="textDiv">
          <p>您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。</p>
          <p>本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。</p>
        </div>
      </div>
      <div class="item">
        <div class="titleDiv">
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 0C7.21187 0 0 7.21187 0 16C0 24.7881 7.21187 32 16 32C24.7881 32 32 24.7881 32 16C32 7.21187 24.7881 0 16 0ZM14.0637 23.2775L7.05713 16.271L9.7085 13.6196L14.1864 18.0975L23.1759 9.9255L25.6991 12.6996L14.0637 23.2775Z" fill="#62678E"/>
          </svg>
          <h4 class="title">收到欠費通知，我怎麼知道是不是詐騙?</h4>
        </div>
        <div class="textDiv">
          <p>您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。</p>
          <p>本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。</p>
        </div>
      </div>
      <div class="item">
        <div class="titleDiv">
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 0C7.21187 0 0 7.21187 0 16C0 24.7881 7.21187 32 16 32C24.7881 32 32 24.7881 32 16C32 7.21187 24.7881 0 16 0ZM14.0637 23.2775L7.05713 16.271L9.7085 13.6196L14.1864 18.0975L23.1759 9.9255L25.6991 12.6996L14.0637 23.2775Z" fill="#62678E"/>
          </svg>
          <h4 class="title">收到欠費通知，我怎麼知道是不是詐騙?</h4>
        </div>
        <div class="textDiv">
          <p>您可先至電信公司直營門市查證，即可知道是否為詐騙，後續有繳費問題再來電與我司聯繫。</p>
          <p>本公司【馨琳揚企管顧問有限公司】創立於民國81年，陸續改制及擴展新的服務項目，為合法經營之公司行號。</p>
        </div>
      </div>--}}
    </div>
    @include('layouts.bapage')
  </div>
</div>