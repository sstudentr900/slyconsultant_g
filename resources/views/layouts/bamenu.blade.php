<style>
  /*publicSection--------------------------------------------------------------------*/
  .publicMenu{
    width: 250px;
    padding: 0 28px 0 20px;
    display: flex;
    flex-direction: column;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    /* background: #fff; */
    /* background: #eff0f4; */
    background: #232536;
    justify-content: flex-start;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
  }
  .publicMenu .logo{
      margin-top: 20px;
  }
  .publicMenu .logo h2{
    font-size: 32px;
    font-weight: 600;
    color: #fff;
    text-align: center;
  }
  .publicMenu .logo h2 span{
    color: rgba(247, 122, 64, 1);
    margin-right: 5px;
  }
  /* .publicMenu .logo img{
    width: 80%;
    margin: auto;
  } */
  .publicMenu .menu{
      margin-top: 20px;
      margin-bottom: 60px;
  }
  .publicMenu .menu b,
  .publicMenu .menu a{
      font-size: 18px; 
      /* color: #282938; */
      color: #62678E;
      font-weight: 400;
      width: 100%;
      display: block;
      cursor: pointer;
      padding: 6px 0;
      letter-spacing: 2px;
      /* font-weight: 200; */
      text-align: center;
  }
  .publicMenu .menu>ul>li.active>a,
  .publicMenu .menu>ul>li.active>b,
  .publicMenu .menu a.active,
  .publicMenu .menu>ul>li>b:hover,
  .publicMenu .menu>ul>li>a:hover{
      /* color: #e08340; */
      /* color: #3056D3; */
      color: #fff;
  }
</style>
<div class="publicMenu">
  <div class="logo">
      <!-- <img src="{{ URL::asset('images/navLogo01.png')}}" alt=""> -->
      <h2><span>SLY</span>馨琳揚</h2>
  </div>
  <div class="menu">
      <ul>
          <li
            @if($active == "baqa" || $active == "baqa_add" || $active == "baqa_update")
                class="active"
            @endif
            >
              <a href="{{ URL::asset('baqa')}}">常見問題</a>
          </li>
          <li
            @if($active == "baservice" || $active == "baservice_add" || $active == "baservice_update")
                class="active"
            @endif
            >
              <a href="{{ URL::asset('baservice')}}">服務項目</a>
          </li>
          <li
            @if($active == "bacar" || $active == "bacar_add" || $active == "bacar_update")
                class="active"
            @endif
            >
              <a href="{{ URL::asset('bacar')}}">購物訂單</a>
          </li>
          <li
            @if($active == "bamanager" || $active == "bamanager_add" || $active == "bamanager_update")
                class="active"
            @endif
            >
              <a href="{{ URL::asset('bamanager') }}">後台管員</a>
          </li>
          <li>
              <a href="{{ URL::asset('basignout')}}">後台登出</a>
          </li>
          <li>
              <a href="{{ URL::asset('fnhome')}}">回到前台</a>
          </li>
      </ul>
  </div>
</div>
