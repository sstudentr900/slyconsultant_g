<style>
  /*customPagination 頁碼*/
  .customPagination{
    text-align: center;
    margin-bottom: 80px;
  }
  .customPagination p{
    font-size: 16px;
    margin-bottom: 15px;
  }
  .customPagination p span{
    color: #A1804C;
    font-weight: 900;
    font-size: 18px;
    margin-right: 5px;
  }
  .customPagination ul{
    display: flex;
    justify-content: center;

  }
  .customPagination li{
    padding: 10px 18px;
    border: 0.5px solid #D9D9D9;
    font-size: 14px;
  }
  .customPagination li.active{
    background: #A1804C;
    color: #fff;
  }
  .customPagination li.disabled{
    color: #ddd;
  }
  .customPagination li:first-child{
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
  }
  .customPagination li:last-child{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
  }
  .customPagination li+li{
    border-left: none;
  }
</style>
<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
// dd($paginator->lastPage());
?>

@if ($paginator->lastPage() > 1)
<div class="customPagination">
  <p>
    總數：<span>{{ $paginator->total() }}</span>筆　每頁顯示：<span>{{ $paginator->count() }}</span>筆　總共：<span>{{ $paginator->lastPage() }}</span>頁
  </p>
  <ul>
      <?php
          /*
          <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
              <a href="{{ $paginator->url(1) }}">{!! trans('pagination.previous') !!}</a>
          </li>
          */
      ?>
      <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
          <a class="page-link" href="{{ $paginator->url(1) }}">{!! trans('pagination.first') !!}</a>
      </li>
      @for ($i = 1; $i <= $paginator->lastPage(); $i++)
          <?php
              $half_total_links = floor($link_limit / 2);
              $from = $paginator->currentPage() - $half_total_links;
              $to = $paginator->currentPage() + $half_total_links;
              if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
              }
              if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
              }
          ?>
          @if ($from < $i && $i < $to) 
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
              <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
          @endif
      @endfor
      <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
          <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{!! trans('pagination.last') !!}</a>
      </li>
      <?php
      /* <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
          <a href="{{ $paginator->url($paginator->lastPage()) }}">{!! trans('pagination.lastPage') !!}</a>
      </li> */
      ?>
  </ul>
</div>  
@endif
