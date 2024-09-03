<!-- 指定繼承 layouts.master 母模板 -->
@extends('layouts.ba2')
<!-- 傳送資料到母模板，並指定變數為content -->
@section('content')
@once
@push('customStyle')
<style>
  .balogin .login {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #232536;
    flex-direction: column;
  }

  .balogin .publicform {
    padding: 40px 60px 80px;
    position: relative;
    max-width: 500px;
    width: 100%;
    border-radius: 8px;
    margin: 10px;
    background: #fff;
    box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
  }

  .balogin .publicform .title {
    text-align: center;
    margin-bottom: 40px;
  }

  .balogin .publicform .title h3 {
    font-size: 36px;
    text-align: center;
    color: #282938;
  }

  .balogin .publicform .title i {
    border: none;
    border-radius: 50%;
    display: flex;
    width: 80px;
    height: 80px;
    margin: auto;
    align-items: center;
    justify-content: center;
    margin-bottom: 3px;
    background-color: #F77A40;
  }

  .balogin .publicform .title i svg {
    fill: #fff;
    width: 30px;
    height: auto;
  }

  .balogin .publicform button {
    width: 100%;
    padding: 15px;
    color: #fff;
    font-size: 18px;
    border: none;
    cursor: pointer;
    background: #3056D3;
    border: none;
    border-radius: 3px;
    font-weight: 400;
    text-align: center;
    text-decoration: none;
  }

  .balogin .publicform li {
    margin-top: 30px;
    display: flex;
    margin-bottom: 20px;
    justify-content: space-between;
    align-items: center;
    position: relative;
    flex-wrap: wrap;
  }

  .balogin .publicform li .label {
    display: none;
  }

  .balogin .publicform li a {
    color: #777;
  }

  .balogin .publicform li:last-child {
    margin-bottom: 0;
  }

  .balogin .publicform li:last-child a:hover {
    text-decoration: revert;
  }

  .balogin .publicform li:last-child button {
    max-width: 160px;
  }

  .balogin .publicform .input {
    width: 100%;
  }

  .balogin .publicform textarea,
  .balogin .publicform select,
  .balogin .publicform input[type='email'],
  .balogin .publicform input[type='password'],
  .balogin .publicform input[type='text'] {
    border: 1px solid #ddd;
    padding: 15px;
    width: 100%;
    font-size: 16px;
  }

  .balogin .publicform button {
    width: 100%;
    padding: 15px;
    color: #fff;
    font-size: 18px;
    border: none;
    cursor: pointer;
    background: #3056D3;
    border: 1px solid #3056D3;
    border-radius: 3px;
    font-weight: 400;
    text-align: center;
    text-decoration: none;
  }
</style>
@endpush
@endonce
<div class="ba balogin">
  <div class="login">
    <div class="publicform">
      <div class="title">
        <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z" />
          </svg></i>
        <h3>後台登入</h3>
      </div>
      <form method="post">
        {!! csrf_field() !!}
        <ul>
          <li>
            {{--@include('layouts.input',['type'=>'text','id'=>'account','label'=>'帳號'])--}}
            <label for="account" class="label">帳號</label>
            <div class="input">
              <input type="text" id="account" name="account" placeholder="" value="1@1.1" required="required">
              @error('account')
              <div class="puplicError">{!! $message !!}</div>
              @enderror
          </li>
          <li>
            {{--@include('layouts.input',['type'=>'password','id'=>'password','label'=>'密碼'])--}}
            <label for="password" class="label">密碼</label>
            <div class="input">
              <input type="text" id="password" name="password" placeholder="" value="1" required="required">
              @error('password')
              <div class="puplicError">{!! $message !!}</div>
              @enderror
          </li>
          <li>
            <!-- <div class="publicFlex">
                  <input type="checkbox" id="remember"> 
                  <label for="remember">記住密碼</label>
                </div> -->
            <div class="gohome">
              <a href="./">回首頁?</a>
            </div>
            <button type='submit'>登入</button>
          </li>
        </ul>
      </form>
    </div>
  </div>
</div>
@endsection