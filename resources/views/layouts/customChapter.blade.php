<style>
  .customChapter{
    display: flex;
    margin-bottom: 80px;
    justify-content: space-between;
  }
  .customChapter a{
    font-size: 16px;
    position: relative;
    max-width: 48%;
  }
  .customChapter .prev{
    padding-left: 60px;
  }
  .customChapter .next{
    padding-right: 60px;
  }
  .customChapter h6{
    font-size: 14px;
    font-weight: 200;
  }
  .customChapter .arrow{
    width: 48px;
    height: 48px;
    /* border: 1px solid #e0e0e0; */
    position: absolute;
    top: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    /* background: #fff; */
    background: #A1804C;
  }
  .customChapter .arrow svg{
    /* fill: rgb(106,106,106); */
    fill: #fff;
  }
  .customChapter .next .arrow{
    right: 0;
  }
  .customChapter .prev .arrow{
    left: 0;
  }
  .customChapter a:hover h4{
    color: #A1804C;
  }
  /* .customChapter a:hover .arrow{
    background: #A1804C;
  }
  .customChapter a:hover .arrow svg{
    fill: #fff;
  } */
</style>
<div class="customChapter">
  @if ($Previou!=false)
  <a class="prev" href="{{ route($nextPageName,['id'=>$Previou->id]) }}" rel="prev">
      <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 12l9-8v6h15v4h-15v6z"/></svg></div>
      <h6>上一篇</h6>
      <h4 class="customLimit">{{ $Previou->title }}</h4>
  </a>
  @else
  <a class="prev" href="{{ route($prePageName) }}"  rel="prev">
      <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 12l9-8v6h15v4h-15v6z"/></svg></div>
      <h6>其他活動</h6>
      <h4>返回列表</h4>
  </a>
  @endif

  @if ($Next!=false)
  <a class="next" href="{{ route($nextPageName,['id'=>$Next->id]) }}" rel="next">
      <h6>下一篇</h6>
      <h4 class="customLimit">{{ $Next->title }}</h4>
      <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12l-9-8v6h-15v4h15v6z"/></svg></div>
  </a>
  @else
  <a class="next" href="{{ route($prePageName) }}" rel="next">
      <h6>其他活動</h6>
      <h4>返回列表</h4>
      <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12l-9-8v6h-15v4h15v6z"/></svg></div>
  </a>
  @endif
</div>