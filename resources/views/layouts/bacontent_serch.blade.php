@once
@push('customStyle')
<style>
  .publicMainContent_search{
      padding: 20px 15px;
      color: #777;
  }
  .publicMainContent_search li{
      display: flex;
      align-items: stretch;
      justify-content: space-between;
      border-bottom: 1px solid #ddd;
      font-size: 14px;
      list-style: none;
  }
  .publicMainContent_search li>div {
      flex: 1;
      padding: 15px 10px;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
  }
  .publicMainContent_search .coverDiv img{
    width: 100%;
    max-width: 60px;
    height: auto;
    max-height: 60px;
    object-fit: contain;
  }
  .publicMainContent_search ul:nth-child(1) li p{
    color: #444;
    font-weight: bold;
  }
  .publicMainContent_search li>div.sortDiv,
  .publicMainContent_search li>div.idDiv{
    flex: 0 0 60px;
  }
  .publicMainContent_search li>div.releaseDiv{
    flex: 0 0 80px;
  }
  .publicMainContent_search li>div.updated_atDiv{
    flex: 0 0 180px;
  }
  .publicMainContent_search li>div.coverDiv{
    flex: 0 0 110px;
  }
  .publicMainContent_search li>div.modifyDiv{
    flex: 0 0 110px;
  }
</style>
@endpush
@endonce
<div class="publicMainContent_search">
  <ul>
    <li>
      @foreach($forms as $form)
        <div class="{{ $form['name'].'Div' }}">
          <p>{{ $form['text'] }}</p>
        </div>
      @endforeach
      {{--<div class='idDiv'>
        <p>#</p>
      </div>
      <div class='updatedDiv'>
        <p>修改時間</p>
      </div>
      <div class='coverDiv'>
        <p>圖片</p>
      </div>
      <div class='accountDiv'>
        <p>帳號</p>
      </div>
      <div class='nameDiv'>
        <p>姓名</p>
      </div>
      <div class='phoneDiv'>
        <p>電話</p>
      </div>
      <div class='releaseDiv'>
        <p>狀態</p>
      </div>
      <div class='modify'>
        <p>動作</p>
      </div>--}}
    </li>
  </ul>
  <ul>
    @foreach($datas as $data)
    <li>
      @foreach($forms as $form)
        <div class="{{ $form['name'].'Div' }}">
          {{--@php 
            print_r($data);
          @endphp--}}
          @if ($form['type']=='img')
            <img src="{{ URL::asset(config('app.imgName')).'/'.$data[$form['name']].'?'.rand() }}">
          @elseif ($form['type']=='release')
            <p>{{ $data[$form['name']]==$form['v_text']?$form['y_text']:$form['n_text'] }}</p>
          @elseif ($form['type']=='text')
            <p>{{ $data[$form['name']] }}</p>
          @elseif ($form['type']=='modify')
            @include('layouts.bamodify')
          @endif
        </div>
      @endforeach
      {{-- <div class='idDiv'>
        <p>{{ $data->id }}</p>
      </div>
      <div class='updatedDiv'>
        <p>{{ $data->updated_at }}</p>
      </div>
      <div class='coverDiv'>
        <img src="{{ URL::asset(config('app.imgName')).'/'.$data->cover.'?'.rand() }}">
      </div>
      <div class='accountDiv'>
        <p>{{ $data->account }}</p>
      </div>
      <div class='nameDiv'>
        <p>{{ $data->name }}</p>
      </div>
      <div class='phoneDiv'>
        <p>{{ $data->phone }}</p>
      </div>
      <div class='releaseDiv'>
        <p>{{ $data->release=='y'?'使用':'停用' }}</p>
      </div>
      @include('layouts.bamodify') --}}
    </li>
    @endforeach
  </ul>
</div>