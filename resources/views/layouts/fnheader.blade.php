<style>
  .customNav{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9;
    padding: 0 20px;
    user-select: none;
    background: rgba(254,241,205,0.3);
    box-shadow: 0 0 4px 3px rgba(254,241,205,0.3);
    backdrop-filter: blur(18px);
  }
  .customNav .logo{
    padding: 20px 30px;
    box-shadow: 0px 4px 4px #F6CC88;
    border-radius: 0px 0px 30px 30px;
    /* background: rgba(255,248,230,.9); */
    /* backdrop-filter: blur(10px); */
    background: #fff8e6;
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
  }
  .customNav .logo img{
    width: 160px;
  }

  .customNav .lists{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 50px;
  }
  .customNav .item{
    padding: 12px;
    display: inline-block;
    position: relative;
  }
  .customNav .item a,
  .customNav .item b{
    color: #3A2313;
    font-weight: 400;
    font-size: 16px;
    /* font-weight: bold; */
    transition: .2s;
    cursor: pointer;
  }
  .customNav .item a:hover,
  .customNav .item b:hover{
    color: #e08340;
  }
  .customNav .item:first-child{
    padding-left:0;
  }
  .customNav .item:last-child{
    padding-right:0;
  }
  .customNav .item>ul{
    display: none;
  }
  .customNav .item:hover>ul{
    position: absolute;
    top: 100%;
    list-style: none;
    background: #fff;
    box-shadow: 0 3px 3px rgb(0 0 0 / 20%);
    display: block;
    width: 140px;
  }
  .customNav .item:hover>ul li a{
    padding: 8px 20px;
    display: block;
  }
  .customNav .customHamburger{
    width: 28px;
    height: 28px;
    display: none;
    align-items: center;
    cursor: pointer;
    position: fixed;
    right: 20px;
    top: 26px;
    z-index: 3;
  }
  .customNav .customHamburger span{
    width: 100%;
    height: 3px;
    position: relative;
    background: #e08440;
    display: block;
    transition: background .5s;
    border-radius: 30px;
  }
  .customNav .customHamburger span:before,
  .customNav .customHamburger span:after{
    content: '';
    width: 100%;
    height: 100%;
    border-radius: 30px;
    background: #e08440;
    transform: translateY(-300%);
    position: absolute;
    left: 0;
    transition: transform .3s;
  }
  .customNav .customHamburger span:after{
    transform: translateY(300%);
  }
  .customNav.active::before{
    content:'';
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,.8);
    position: fixed;
    z-index: 2;
  }
  .customNav.active.scroll .lists,
  .customNav.active .lists{
    left: 0;
  }
  .customNav.scroll .customContainer .logo{
    padding: 8px 20px;
    width: 100%;
    border-radius: 0;
  }
  .customNav.scroll .customContainer .logo img{
    width: 120px;
  }
  .customNav.scroll .lists{
    display: flex;
    flex-direction: column;
    width: 240px;
    height: 100vh;
    justify-content: flex-start;
    background: rgb(255,248,230);
    position: fixed;
    left: -240px;
    padding-top: 20px;
    transition: .2s;
    z-index: 2;
  }
  .customNav.scroll .list{
    display: flex;
    flex-direction: column;
    width: 100%;
  }
  .customNav.scroll .item{
    color: #fffaeb;
  }
  .customNav.scroll .item,
  .customNav.scroll .item:first-child,
  .customNav.scroll .item:last-child{
    padding: 0;
  }
  .customNav.scroll .item b{
    padding: 10px 20px;
    width: 100%;
    display: block;
    position: relative;
    /* border-bottom: 1px solid #ddd; */
  } 
  .customNav.scroll div.item b{
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .customNav.scroll div.item b::after{
    display: inline-block;
    margin-left: 0.255em;
    vertical-align: 0.255em;
    content: "";
    border-top: 0.3em solid;
    border-right: 0.3em solid transparent;
    border-bottom: 0;
    border-left: 0.3em solid transparent;
    transform: rotate(-90deg);
    transition: transform .35s ease, opacity .35s ease;
    opacity: .5;
  }
  .customNav.scroll .item:hover b{
    color: #e08340;
  }
  .customNav.scroll .item ul{
    display: none;
  }
  .customNav.scroll .item ul,
  .customNav.scroll .item:hover ul{
    /* border-bottom: 1px solid #ddd; */
    position: relative;
    top: 0;
    background: none;
    box-shadow: none;
    width: 100%;
  }
  .customNav.scroll div.item.active ul{
    display: block;
  }
  .customNav.scroll div.item.active b::after{
    transform: rotate(0deg);
    opacity: .9;
  }
  .customNav.scroll .item a,
  .customNav.scroll .item:hover a {
    padding: 4px 20px 4px 20px;
    width: 100%;
    display: block;
    cursor: pointer;
    font-size: 15px;
    opacity: .7;
  }
  .customNav.scroll .item a:hover {
    opacity: 1;
  }
  .customNav.scroll .customHamburger{
    display: flex;
  }
  .customNav.active .customHamburger span{
    background: transparent;
  }
  .customNav.active .customHamburger span:after{
    transform: rotate(45deg);
  }
  .customNav.active .customHamburger span:before{
    transform: rotate(-45deg);
  }
  /*首頁和其他頁LOGO大小不一樣*/
  .customNav.fnhome .logo{
    padding: 40px 30px 30px;
  }
  .customNav.fnhome .logo img{
    width: 200px;
  }
  @media (max-width: 1040px) {
    /* .customNav .lists{
      padding-top: 200px;
    } */
    .customNav .customHamburger{
      display: flex;
    }
    .customNav .customContainer .logo{
      left: 0;
      transform: translateX(0);
      padding: 8px 20px;
      width: 100%;
      border-radius: 0;
      background: #fff8e6;
    }
    .customNav .customContainer .logo img{
      width: 120px;
    }
    .customNav .lists{
      display: flex;
      flex-direction: column;
      width: 200px;
      height: 100vh;
      justify-content: flex-start;
      background: rgb(255,248,230);
      position: fixed;
      left: -200px;
      padding-top: 20px;
      transition: .2s;
      z-index: 2;
    }
    .customNav .list{
      display: flex;
      flex-direction: column;
      width: 100%;
    }
    .customNav .item{
      color: #fffaeb;
    }
    .customNav .item,
    .customNav .item:first-child,
    .customNav .item:last-child{
      padding: 0;
    }
    .customNav .item b{
      padding: 10px 20px;
      width: 100%;
      display: block;
      position: relative;
      /* border-bottom: 1px solid #ddd; */
    } 
    .customNav div.item b{
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .customNav div.item b::after{
      display: inline-block;
      margin-left: 0.255em;
      vertical-align: 0.255em;
      content: "";
      border-top: 0.3em solid;
      border-right: 0.3em solid transparent;
      border-bottom: 0;
      border-left: 0.3em solid transparent;
      transform: rotate(-90deg);
      transition: transform .35s ease, opacity .35s ease;
      opacity: .5;
    }
    .customNav .item:hover b{
      color: #e08340;
    }
    .customNav .item:hover ul,
    .customNav .item ul{
      display: none;
    }
    .customNav .item ul,
    .customNav .item:hover ul{
      /* border-bottom: 1px solid #ddd; */
      position: relative;
      top: 0;
      background: none;
      box-shadow: none;
      width: 100%;
    }
    .customNav .item:hover>ul li a{
      padding: 4px 20px 4px 20px;
    }
    .customNav div.item.active ul{
      display: block;
    }
    .customNav div.item.active b::after{
      transform: rotate(0deg);
      opacity: .9;
    }
    .customNav .item a,
    .customNav .item:hover a {
      padding: 4px 20px 4px 20px;
      width: 100%;
      display: block;
      cursor: pointer;
      font-size: 15px;
      opacity: .7;
    }
    .customNav .item a:hover {
      opacity: 1;
    }
  }
</style>
<div class="customNav {{Route::current()->getName()=='fnhome'?'fnhome':''}}">
  <div class="customContainer">
    <div class="customHamburger">
      <span></span>
    </div>
    <div class="logo">
      <img src="{{ URL::asset('images/navLogo01.png')}}" alt="">
    </div>
    <div class="lists">
      <div class="list">
        <a class="item" href="{{ route('fnhome') }}">
          <b>首頁</b>
        </a>
        <div class="item">
          <b>最新消息</b>
          <ul>
            {{--<li>
              <a href="{{ route('News', ['page'=>1]) }}">最新消息</a>
            </li>
            <li>
              <a href="{{ route('CourseNews', ['page'=>1]) }}">專業課程活動</a>
            </li>
            <li>
              <a href="{{ route('fnmeeting', ['page'=>1]) }}">會議資訊</a>
            </li> --}}
            <li>
              <a href="{{ route('fnactivityrecordlist') }}">中心紀事</a>
            </li>
            <li>
              <a href="{{ route('fncourseinfolist') }}">課程資訊</a>
            </li>
          </ul>
        </div>
        <div class="item">
          <b>認識ISTART</b>
          <ul>
            <li>
              <a href="{{ route('fnintroduction') }}">建置緣由</a>
            </li>
            <li>
              <a href="{{ route('fnteam') }}">專業團隊</a>
            </li>
            <li>
              <a href="{{ route('fncooperative') }}">合作機構</a>
            </li>
          </ul>
        </div>
        <div class="item">
          <b>服務項目</b>
          <ul>
            <li>
              <a href="{{ route('fncasemanagement') }}">個案管理</a>
            </li>
            <li>
              <a href="{{ route('fnpsychotherapy') }}">心理治療</a>
            </li>
            <li>
              <a href="{{ route('fnoccupationaltherapy') }}">職能治療</a>
            </li>
            <li>
              <a href="{{ route('fnpharmacycounseling') }}">藥物諮詢</a>
            </li>
            <li>
              <a href="{{ route('fnfamilyassessmenttreatment') }}">家庭評估處遇</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="list">
        <div class="item">
          <b>成長園地</b>
          <ul>
            <li>
              <a href="{{ route('fngroupcourselist') }}">團體課程</a>
            </li>
            <li>
              <a href="{{ route('fnfamilytalklist') }}">家屬座談會</a>
            </li>
            <li>
              <a href="{{ route('fnhealth') }}">衛教資源</a>
            </li>
            <li>
              <a href="{{ route('fnhelp') }}">自助資源</a>
            </li>
          </ul>
        </div>
        <a href="{{ route('fninformationlist') }}" class="item">
          <b>時事消息</b>
        </a>
        <a href="{{ route('fnrelatedlinks') }}" class="item">
          <b>多媒體資源</b>
        </a>
        <a href="{{ route('fncontact') }}" class="item">
          <b>聯絡我們</b>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
  let ticking = false;
  const customNav = document.querySelector('.customNav')
  const customNavH = customNav.querySelector('.customHamburger')
  const customNavB = customNav.querySelectorAll('.list div.item b')
  const customNavItemActive = customNav.querySelectorAll('.list div.item.active')
  customNavH.addEventListener('click',function(){
    // console.log(this,this.classList.contains('active'))
    customNavItemActive.forEach(element => {
      element.classList.remove('active')
    });
    if(customNav.classList.contains('active')){
      // body.classList.remove('stopScroll')
      customNav.classList.remove('active')
    }else{
      // body.classList.add('stopScroll')
      customNav.classList.add('active')
    }
  })
  customNavB.forEach(element => {
    element.addEventListener('click',function(){
      let item = element.closest('.item')
      // console.log(item)
      if(item.classList.contains('active')){
        item.classList.remove('active')
      }else{
        item.classList.add('active')
      }
    })
  });
  // document.addEventListener('scroll', function(e) {
  //   if (!ticking) {
  //     window.requestAnimationFrame(function() {
  //       // console.log('當前滾動數值:',window.scrollY)
  //       ticking = false;
  //       // customNav.classList.remove('active')
  //       // customNavItemRemoveActive()
  //       if(window.scrollY>80){
  //         customNav.classList.add('scroll')
  //       }else{
  //         customNav.classList.remove('scroll')
  //         // customNav.classList.remove('active')
  //       }  
  //     });
  //     ticking = true;
  //   }
  // });
</script>