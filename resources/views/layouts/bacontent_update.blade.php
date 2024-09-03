@once
@push('customStyle')
<style>
  .publicMainContent_update{
    padding: 60px 40px 20px;
  }
  .publicMainContent_update ul{
    max-width: 800px;
    margin: auto;
  }
  .publicMainContent_update li{
    display: flex;
    align-items: center;
    /* justify-content: space-between; */
    font-size: 14px;
    list-style: none;
  }
  .publicMainContent_update li label{
    color: #777;
    letter-spacing: 1px;
  }
  .publicMainContent_update .publicFlex>label,
  .publicMainContent_update li>label{
    flex: 0 0 120px;
    font-size: 16px;
    padding-right: 24px;
    display: flex;
    align-items: baseline;
    justify-content: end;
  }
  .publicMainContent_update li>label a {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }
  .publicMainContent_update li>label a svg{
    width: 14px;
    height: 14px;
    margin-left: 6px;
    fill: #777;
  }
  .publicMainContent_update label+div{
    flex: 1 1;
    display: flex;
  }
  .publicMainContent_update label+div>select,
  .publicMainContent_update label+div>input,
  .publicMainContent_update label+div>textarea{
    padding: 12px;
    width: 100%;
    border: 1px solid #ced4da;
    font-size: 16px;
  }
  .publicMainContent_update label+div>textarea:not(.tinymce){
    min-height: 180px;
  }
  .publicMainContent_update div.mce-tinymce,
  .publicMainContent_update textarea#tinymce,
  .publicMainContent_update textarea.tinymce{
    min-height: 460px;
    width: 100%;
  }
  .publicMainContent_update li+li{
    margin-top: 24px;
  }
  .publicMainContent_update li>.publicFlex{
    width: 100%;
  }
  .publicMainContent_update .publicFlex>.publicFlex{
    flex: 1 1;
  }
  .publicMainContent_update .input{
    position: relative;
  }
  .publicMainContent_update .publicBtn2{
    color: #fff;
    background: #3056D3;
    border: 1px solid #3056D3;
    padding: 8px 20px;
    border-radius: 3px;
    font-size: 16px;
    font-weight: 400;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    margin-top: 20px;
  }
</style>
@endpush
@endonce
<div class="publicMainContent_update">
  <form method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <ul>
      @foreach ($forms as $array)
        <li>
            @include('layouts.input',$array)
        </li>
      @endforeach
      {{--<li>
          @include('layouts.input',['type'=>'file','id'=>'cover','label'=>'圖片'])
      </li>
      <li>
          @include('layouts.input',['type'=>'text','id'=>'account','label'=>'帳號'])
      </li>
      @if ($inputPassword)
      <li>
          @include('layouts.input',['type'=>'password','id'=>'password','label'=>'密碼'])
      </li>
      @endif
      <li>
          @include('layouts.input',['type'=>'text','id'=>'name','label'=>'姓名'])
      </li>
      <li>
          @include('layouts.input',['type'=>'tel','id'=>'phone','label'=>'電話'])
      </li>
      <li>
          @include('layouts.input',['type'=>'release','id'=>'release','label'=>'狀態'])
      </li>--}}
      <li>
        <label></label>
        <div class="input">
          <button class="publicBtn2" type="submit">送出</button>
        </div>
      </li>
    </ul>
  </form>
</div>