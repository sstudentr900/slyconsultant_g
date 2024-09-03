@if($pageTotle!=1)
  @once
  @push('customStyle')
  <style>
    /*page 頁碼*/
    .publicPage{
        text-align: center;
        padding: 0 15px 20px;
    }
    .publicPage ul{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .publicPage li {
        padding: 0;
        margin: 0 3px;
    }
    .publicPage li a.pre,
    .publicPage li a.next {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eee;
        border-radius: 60px;
        min-width: 40px;
        height: 40px;
    }
    .publicPage li a.pre::after,
    .publicPage li a.next::after{
        position: absolute;
        content: '';
        border: 2px solid #888;
        width: 8px;
        height: 8px;
        transform: rotate(45deg);
        border-top: none;
        border-right: none;
        left: 18px;
    }
    .publicPage li a.next::after{
        transform: rotate(-135deg);
        left: 15px;
    }
    .publicPage li a {
        padding: 0px 11px;
        min-width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
        font-size: 12px;
        color: #666;
    }
    .publicPage li a.pre:hover,
    .publicPage li a.next:hover {
        background: #EA6200;
    }
    .publicPage li a.pre:hover:after,
    .publicPage li a.next:hover:after {
        border-color: #fff;
    }
  </style>
  @endpush
  @endonce
  <div class="publicPage">
      <ul>
          <li>
              <a class="pre" href="{{  route($active,[ 'id'=>$pageStart>1?($pageStart-1):1]) }}"></a>
          </li>
          <li>
              <a>{{ $pageStart }} / {{ $pageTotle }}</a>
          </li>
          <li>
              <a class="next" href="{{ route($active,[ 'id'=>$pageStart<$pageTotle?($pageStart+1):$pageTotle ]) }}"></a>
          </li>
      </ul>
  </div>
@endif