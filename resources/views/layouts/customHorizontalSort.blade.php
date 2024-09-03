<style>
  /*customHorizontalSort 橫式排序*/
  .customHorizontalSort .items{
    padding: 40px 0 60px;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    /* justify-content: center; */
    min-height: 480px;
  }
  .customHorizontalSort .item{
    flex: 0 0 calc((100% - 60px)/3);
    margin: 0;
    background: #FFFFFF;
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
  }
  .customHorizontalSort .item .img{
    height: 230px;
    position: relative;
  }
  .customHorizontalSort .item img{
    object-fit: cover;
    width: 100%;
    height: 100%;
  }
  .customHorizontalSort .item .text{
    padding: 30px 20px;
  }
  .customHorizontalSort .item h4{
    font-size: 28px;
    font-weight: 600;
    color: #000;
    min-height: 67px;
  }
  .customHorizontalSort .item p{
    font-size: 16px;
    font-weight: 400;
    color: #675C55;
    margin-bottom: 40px;
  }
  .customHorizontalSort .item a{
    font-size: 18px;
    font-weight: 400;
    color: #EA6200;
    text-decoration: revert;
  }
  .customHorizontalSort .item span{
    font-size: 13px;
    font-weight: 400;
    color: #94A2B3;
  }
  .customHorizontalSortNav{
    display: flex;
    padding: 30px 0 0;
    margin-bottom: -15px;
  }
  .customHorizontalSortNav a{
    padding: 6px 24px;
    border: 1px solid #b7b7b7;
    border-radius: 30px;
    background: #fff;
    font-size: 16px;
    font-weight: 300;
  }
  .customHorizontalSortNav a+a{
    margin-left: 10px;
  }
  .customHorizontalSortNav a.active{
    border: 1px solid #A1804C;
    background: #A1804C;
    color: #fff;
  }
  @media (max-width: 1020px) {
    .customHorizontalSort .items{
      padding: 30px 0 60px;
    }
    .customHorizontalSort .item{
      flex: 0 0 calc((100% - 30px)/2);
    }
  }
  @media (max-width: 620px) {
    .customHorizontalSort .item{
      flex: 0 0 100%;
    }
  }
</style>
<div class="customHorizontalSort">
  <div class="customContainer">
    <!-- 類別 -->
    @if(isset($classDatas))
      <div class="customHorizontalSortNav">
        <a href="{{ route($classRouteName,['id'=>0]) }}" class="{{ $classActive=='0'?'active':'' }}">所有</a>
        @foreach ($classDatas as $classData)
          <a href="{{ route($classRouteName,['id'=>$classData->id]) }}" class="{{ $classActive==$classData->id?'active':'' }}">
            {{ $classData->name }}
          </a>
        @endforeach
      </div>
    @endif
    <!-- 內容 -->
    @if (count($values))
      <div class="items">
        @foreach ($values as $value)
          <div class="item">
            <div class="img">
              <img class='customImg' src="{{ asset($imgSrc.$value->cover)}}{{-- 圖片 --}}" alt="">
            </div>
            <div class="text">
              <h4 class="customLimit2">{{ $value->title }}{{-- 標題 --}}</h4>
              <!-- @if (mb_substr(strip_tags($value->content).'……',0,100,"utf-8")!='……')
                <p>{{ mb_substr(strip_tags($value->content).'',0,100,"utf-8") }}{{-- 內文 --}}</p>
              @endif -->
              <div class="customFlexBetween">
                <a href="{{ route($routeNextPageName,['id'=>$value->id]) }}{{-- 路徑 --}}">Read more</a>
                <span>{{ date('Y-m-d', strtotime($value->created_at)) }}{{-- 時間 --}}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      @include('layouts.customPagination', ['paginator' => $values])
    @else
      <div class="items">
        <p>目前尚無任何資訊。</p>
      </div>
    @endif
  </div>
</div>