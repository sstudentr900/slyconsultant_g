<style>
  /*customBreadcrumbs面包屑*/
  .customBreadcrumbs{
    padding-top: 160px;
  }
  .customBreadcrumbs .box{
    background: rgba(255, 255, 255, 0.6);
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
    padding: 30px 40px;
  }
  .customBreadcrumbs h2{
    color: #232233;
    font-weight: 700;
    font-size: 40px;
    margin-bottom: 10px;
    line-height: 1.2;
  }
  .customBreadcrumbs .customFlex{
    color: #6C6C72;
    font-weight: 400;
  }
  .customBreadcrumbs .customFlex a{
    position: relative;
    font-weight: 400;
    font-size: 16px;
  }
  .customBreadcrumbs .customFlex a+a{
    padding-left: 16px;
  }
  .customBreadcrumbs .customFlex a+a::after{
    content: '/';
    position: absolute;
    left: 5px;
    top: 4px;
    font-size: 12px;
  }
  @media (max-width: 1060px){
    .customBreadcrumbs {
      padding-top: 110px;
    }
  }
  @media (max-width: 1020px){
    .customBreadcrumbs h2{
      font-size: 32px;
    }
    .customBreadcrumbs .box{
      padding: 30px;
    }
  }
  @media (max-width: 680px){
    .customBreadcrumbs .box{
      padding: 20px;
    }
  }
</style>
<div class="customBreadcrumbs">
    <div class="customContainer">
      <div class="box">
        <h2>{{$title}}</h2>
        <div class="customFlex">
          @foreach ($values as $value)
            @if($value['href'] && array_key_exists('id',$value))
              <a href="{{ route($value['href'],['id'=>$value['id']]) }}">{{$value['name']}}</a>
            @elseif($value['href'])
              <a href="{{ route($value['href']) }}">{{$value['name']}}</a>
            @else
              <a href="#">{{$value['name']}}</a>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>