@once
@push('customStyle')
<style>
  .fn_navDiv {
    position: relative;
    height: 80px;
  }

  .fn_navDiv .fn_navContent {
    background: rgba(35, 37, 54, 1);
    border-bottom: 1px solid rgba(255, 255, 255, .1);
    position: fixed;
    width: 100%;
    z-index: 99;
  }

  .fn_navDiv .publicWidth {
    height: 80px;
    position: relative;
    display: grid;
    /* grid-template-columns: repeat(3, 1fr); */
    /* grid-template-columns: 4fr 4fr 1fr; */
    grid-template-columns: 370px 1fr;
    align-items: center;
    gap: 60px;
  }

  .fn_navDiv .navDiv {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .fn_navDiv .logo {
    font-size: 28px;
    font-weight: 300;
    color: #fff;
  }

  .fn_navDiv .logo span {
    /* color: rgba(255, 161, 140, 1); */
    color: rgba(247, 122, 64, 1);
    margin-right: 5px;
    font-weight: 900;
  }

  .fn_navDiv .nav {
    display: flex;
  }

  .fn_navDiv .nav a {
    font-size: 16px;
    padding: 28px 10px;
    position: relative;
    color: rgba(255, 255, 255, .6);
    font-weight: 300;
    user-select: none;
  }

  .fn_navDiv .nav a:hover,
  .fn_navDiv .nav a.active {
    /* color: rgba(247, 122, 64, 1); */
    color: #fff;
  }

  .fn_navDiv .nav li+li {
    margin-left: 6px;
  }

  .fn_navDiv .nav a.active::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    /* background: rgba(255, 161, 140, 1); */
    background: rgba(247, 122, 64, 1);
  }

  .fn_navDiv .link {
    display: flex;
    align-items: center;
  }

  .fn_navDiv .link .search {
    font-size: 16px;
    color: rgba(247, 122, 64, 1);
    display: flex;
    align-items: center;
    font-weight: 300;
  }

  .fn_navDiv .link .search svg {
    margin-left: 3px;
  }

  .fn_navDiv .link .buy {
    margin-right: 20px;
  }

  .fn_navDiv .link .buy p {
    display: none;
  }

  .fn_navDiv .link .buy .icon {
    position: relative;
  }

  .fn_navDiv .link .buy .icon .number {
    position: absolute;
    display: none;
    align-items: center;
    justify-content: center;
    background: #333;
    width: 20px;
    height: 20px;
    border-radius: 20px;
    color: #fff;
    font-size: 12px;
    background: #f00;
    top: -10px;
    right: -14px;
    line-height: 1;
  }

  .fn_navDiv .link .buy .icon .number.active {
    display: flex;
  }

  .fn_navDiv .link .buy svg path {
    fill: rgb(249 105 57);
  }

  .fn_navDiv .hamburgerDiv {
    display: none;
  }

  @media (max-width: 1200px) {
    .fn_navDiv .publicWidth {
      gap: 0;
    }

    .fn_navDiv .navDiv {
      position: fixed;
      top: 81px;
      height: calc(100vh - 81px);
      width: 100%;
      left: 0;
      width: calc(100% + 60px);
      left: -30px;
      background: rgba(35, 37, 54, 1);
      visibility: hidden;
      opacity: 0;
      transition: 0.2s linear;
      z-index: -1;
      overflow-y: auto;
      display: flex;
      align-items: center;
      /* justify-content: center; */
      justify-content: flex-start;
      flex-direction: column;
    }

    .navActive .fn_navDiv .navDiv {
      visibility: visible;
      opacity: 1;
      padding: 40px 0;
    }

    .fn_navDiv .nav {
      display: block;
      /* padding-top: 40px; */
    }

    .fn_navDiv .nav a {
      text-align: center;
      font-size: 18px;
      padding: 18px 10px;
    }

    .fn_navDiv .nav a.active::after {
      display: none;
    }

    .fn_navDiv .nav li+li {
      margin-left: 0;
    }

    .fn_navDiv .link {
      display: block;
      text-align: center;
    }

    .fn_navDiv .link .buy {
      margin-right: 0;
    }

    .fn_navDiv .link .buy p {
      display: block;
      font-weight: 300;
    }

    .fn_navDiv .link .buy svg {
      display: none;
    }

    .fn_navDiv .link .buy .icon .number {
      top: -50px;
      right: -5px;
    }

    .fn_navDiv .link .buy p,
    .fn_navDiv .link .search p {
      padding: 19px 10px;
      color: rgba(255, 255, 255, .6);
    }

    .fn_navDiv .link .buy p:hover,
    .fn_navDiv .link .search p:hover {
      color: rgba(255, 255, 255, 1);
    }

    .fn_navDiv .link .search svg {
      display: none;
    }

    .fn_navDiv .hamburgerDiv {
      display: flex;
      justify-content: end;
      margin-top: 2px;
    }

    .fn_navDiv .hamburger {
      display: flex;
      width: 60px;
      height: 30px;
      align-items: center;
      cursor: pointer;
      /* margin-left: 20px; */
      position: relative;
    }

    .fn_navDiv .hamburger span {
      width: 100%;
      height: 3px;
      position: relative;
      background: #fff;
      display: block;
      transition: background .5s;
      border-radius: 30px;
    }

    .fn_navDiv .hamburger span:before,
    .fn_navDiv .hamburger span:after {
      content: '';
      width: 100%;
      height: 100%;
      border-radius: 30px;
      background: #fff;
      transform: translateY(-380%);
      position: absolute;
      left: 0;
      transition: transform .3s;
    }

    .fn_navDiv .hamburger span:after {
      transform: translateY(380%);
    }

    /* .fn_navDiv .hamburger:before,
    .fn_navDiv .hamburger:after {
      content: '';
      width: 100%;
      height: 2px;
      border-radius: 30px;
      background: #fff;
      position: absolute;
      left: 0;
      transition: .3s cubic-bezier(.19,1,.22,1);
      transform-origin: center;
      top: calc(50% + 6px);
    } */
    /* .fn_navDiv .hamburger:before {
      top: calc(50% - 6px);
    }
    .fn_navDiv .hamburger:not([data-touch]):hover::after {
      top: calc(50% + 3px);
    }
    .fn_navDiv .hamburger:not([data-touch]):hover::before {
      top: calc(50% - 3px);
    } */
    body.navActive {
      overflow: hidden;
    }

    /* .navActive .fn_navDiv .hamburger:not([data-touch]):hover::after, 
    .navActive .fn_navDiv .hamburger:after {
      top: 50%;
      transform-origin: center;
      transform: rotate(15deg);
    }
    .navActive .fn_navDiv .hamburger:not([data-touch]):hover::before,
    .navActive .fn_navDiv .hamburger:before {
      top: 50%;
      transform-origin: center;
      transform: rotate(-15deg);
    } */
    .navActive .fn_navDiv span:after {
      transform: rotate(30deg);
    }

    .navActive .fn_navDiv span:before {
      transform: rotate(-30deg);
    }

    .navActive .fn_navDiv span {
      background: transparent;
    }

  }

  @media (max-width: 576px) {
    .fn_navDiv .navDiv {
      width: 100%;
      left: 0;
    }

    .fn_navDiv .publicWidth {
      display: flex;
      /* grid-template-columns: 290px 1fr; */
      padding: 0 15px;
      justify-content: space-between;
    }

    .fn_navDiv .logo {
      font-size: 22px;
    }

    .fn_navDiv .hamburger {
      width: 40px;
    }
  }

  .fn_left_link {
    position: fixed;
    right: 5px;
    top: 90%;
    z-index: 99;
  }

  .fn_left_link a {
    width: 46px;
    height: 46px;
    border-radius: 4px;
    padding: 10px;
    background: rgb(205 91 38);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .fn_left_link a img {
    width: 20px;
  }

  .fn_left_link a svg {
    fill: #fff;
    width: 20px;
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<script>
  function navFn() {
    const body = document.querySelector('body')
    const nav = document.querySelector('.fn_navDiv'); //選單名
    if (!nav) {
      return false;
    }
    // const lis = nav.querySelectorAll('.links li:not(.phone)')
    const links = document.querySelectorAll('[data-link]'); //選單
    function scrolTopFn() {
      return document.documentElement.scrollTop || document.body.scrollTop;
    }

    function debounce(func, timeout = 10) {
      let timer;
      return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
          func.apply(this, args);
        }, timeout);
      };
    }

    function removeActive() {
      Array.prototype.map.call(links, function(li) {
        // if(li.dataset.active!='no'){
        // li.className=''
        li.classList.remove("active");
        // }
      })
    }

    function addActive(obj) {
      // removeActive()
      // obj.className='active'
      obj.classList.add("active");
    }

    function offset(obj) {
      let target = document.querySelector('.' + obj)
      return {
        'top': target.offsetTop,
        'bottom': target.offsetTop + target.offsetHeight
      }
    }

    function animation() {
      const scrollAnimation = document.querySelectorAll("*[class^='publicScrollAnimation']"); //滾動動畫
      if (!scrollAnimation.length) return;

      function getoffset(el) {
        const box = el.getBoundingClientRect();
        // console.log('322',el,box.top,window.pageYOffset,document.documentElement.clientTop)
        return {
          top: box.top + window.pageYOffset - document.documentElement.clientTop,
          left: box.left + window.pageXOffset - document.documentElement.clientLeft
        }
      }
      //判斷 width 才有動畫
      const width = 680;
      // console.log(window.matchMedia(`(max-width: ${width}px)`).matches)
      if (window.matchMedia(`(max-width: ${width}px)`).matches) {
        //小於 width 時執行的js
        Array.prototype.map.call(scrollAnimation, function(obj) {
          obj.classList.add('active');
        })
      } else {
        //大於 width 時執行的js
        Array.prototype.map.call(scrollAnimation, function(obj) {
          // console.log((getoffset(obj).top*1-900),scrolTopFn(),(getoffset(obj).top*1-800) < scrolTopFn())
          // if((getoffset(obj).top*1-900) < scrolTopFn()){
          //   obj.classList.add('active');
          // }
          const scrollY = window.scrollY || window.pageYOffset; //IE
          const slideInAt = (scrollY + window.innerHeight) - obj.offsetHeight / 6;
          const offsetTop = getoffset(obj).top;
          const isShow = slideInAt > offsetTop;
          // const vBottom = offsetTop + obj.offsetHeight;
          // const isScroll = window.scrollY < vBottom;
          if (isShow) {
            obj.classList.add('active');
          }
        })
      }
    }

    function navLinkIfActive() {
      // console.log('---------------')
      let scroll = scrolTopFn() + navHeight()
      removeActive()
      for (let i = 0; i < links.length; i++) {
        let offsetArray = offset(links[i].dataset.link)
        // console.log('338',links[i].dataset.link,offsetArray,scroll)
        // console.log(links[i].dataset.link,'-> top',offsetArray.top,'bottom',offsetArray.bottom ,'scroll',offsetArray.top < scroll && scroll < offsetArray.bottom)
        if (offsetArray.top <= scroll && scroll < offsetArray.bottom) {
          //const target = links[i].dataset.link
          //window.location.hash = target;
          //console.log(target)
          addActive(links[i]);
          break;
        }
      }
    }

    function navHeight() {
      // return window.innerWidth >= 1160 ? 93 : 74;
      return nav.offsetHeight
    }

    function scrollToFn(target) {
      let topValue = offset(target).top
      if (target != 'fnindex_contact') {
        topValue = (topValue) - navHeight() + 5
      }
      console.log('scrollToFn', target, document.querySelector('.' + target).offsetTop)
      setTimeout(() => {
        console.log('scrollToFn setTimeout', target, document.querySelector('.' + target).offsetTop)
      }, 1000)
      window.scrollTo({
        top: topValue,
        behavior: 'smooth' //平滑滚动
      })
    }

    function navIfActive() {
      if (scrolTopFn() > 1) {
        nav.classList.add('active')
      } else {
        nav.classList.remove('active')
      }
    }

    function scrollOnLoad() {
      const hash = window.location.hash;
      //console.log('scrollOnLoad', hash)
      if (hash) {
        const target = hash.replace('#', '');
        if (document.querySelector('.' + target)) {
          scrollToFn(target)
          // removeActive()  //選單_連結removeActive
          // addActive(document.querySelector('[data-link="'+target+'"]')); //選單_連結active
        }
      }
    }

    function isPage(name) {
      return window.location.href.includes(name)
    }

    function navActive() {
      //console.log('navActive')
      if (body.classList.contains('navActive')) {
        body.classList.remove('navActive')
      } else {
        body.classList.add('navActive')
      }
    }

    //手機點擊 hamburger
    nav.querySelector('.hamburger').addEventListener('click', navActive)

    //改變路徑
    window.addEventListener('hashchange', function() {
      console.log('改變路徑 hashchange')
      scrollOnLoad()
    })

    //點擊選單
    Array.prototype.map.call(links, function(li) {
      // console.log(415,li)
      li.addEventListener('click', (e) => {
        const target = li.dataset.link
        //console.log('點擊選單', target, isPage('index'))
        if (isPage('index')) {
          //判斷是index
          //window.location.hash = '';
          window.location.hash = target;
          scrollOnLoad()
          //console.log('點擊選單', window.location.hash, target)
          // removeActive()
          // addActive(li);
          // scrollToFn(target)
          navActive()
        } else {
          // 轉址
          window.location.href = 'index#' + target
        }
      })
    })

    //立即購買
    nav.querySelector('.link .buy').addEventListener('click', function() {
      // console.log(`立即購買`)
      const car = car_search({
        obj: 'car'
      })
      if (!car || !car.length) {
        alert('目前沒有資料');
        window.location = "./";
        return false;
      }
      window.location = "car";
    })

    //頁面滾動時
    if (isPage('index')) {
      //首頁
      document.addEventListener('scroll', debounce(function() {
        navLinkIfActive() //選單_連結active
        animation() //物件顯示
        navIfActive() //選單active
      }));
    } else {
      //其他頁
      document.addEventListener('scroll', debounce(function() {
        animation() //物件顯示
        navIfActive() //選單active
      }));
    }

    //開始
    animation()
    scrollOnLoad()
  }
</script>
@endpush
@endonce
<div class="fn_navDiv">
  <div class="fn_navContent">
    <div class="publicScrollAnimation  publicWidth">
      <a class="logo" href="{{ route('fnindex') }}">
        <!-- <a class="logo" href="https://web.sly-ha.com.tw/"> -->
        <span>SLY</span>馨琳揚企管顧問
      </a>
      <div class="navDiv">
        <ul class="nav">
          <li><a data-link="fnindex_header" @if($active=='fnindex' )class="active" @endif>首頁</a></li>
          <li><a data-link="fn_qa">FAQs</a></li>
          <li><a data-link="fnindex_about">關於馨琳揚</a></li>
          <li><a data-link="fnindex_professional">專業領域</a></li>
          <!-- <li><a href="{{ route('fnservice') }}" @if($active=='fnservice')class="active"@endif>服務項目</a></li> -->
          <li><a data-link="fnindex_service">服務項目</a></li>
          <li><a data-link="fnindex_contact">聯絡我們</a></li>
        </ul>
        <div class="link">
          <a class="buy">
            <p>購物車</p>
            <div class="icon">
              <div class="number">0</div>
              <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0.612093C0.184155 0.119026 0.577808 -0.0119943 1.09085 0.000840379C1.87703 0.0200924 2.66434 0.0131403 3.45108 0.00404905C4.18094 -0.00450741 4.43718 0.228121 4.5898 0.845791C4.81338 1.74903 5.0347 2.65334 5.26729 3.55445C5.28306 3.61648 5.38105 3.69456 5.44976 3.70311C5.61927 3.72451 5.79329 3.7106 5.96562 3.7106C11.3016 3.7106 16.637 3.71114 21.973 3.709C22.2377 3.709 22.4821 3.75178 22.6956 3.90954C23.0273 4.155 23.0414 4.49084 22.9552 4.83096C22.5666 6.3615 22.1668 7.88936 21.7669 9.41723C21.5507 10.2435 21.3248 11.0676 21.1063 11.8938C21.0359 12.1612 20.9644 12.4296 20.9149 12.7013C20.8518 13.0457 20.4091 13.3885 20.0549 13.388C15.5884 13.3794 11.122 13.3821 6.65549 13.3826C6.1126 13.3826 5.88396 13.0789 5.76006 12.6029C5.42047 11.3013 5.09665 9.99586 4.76832 8.691C4.51603 7.68775 4.26542 6.68397 4.01593 5.68019C3.75632 4.63577 3.49895 3.59135 3.24158 2.54692C3.17738 2.28542 3.11938 2.02284 3.05348 1.76187C3.02814 1.66026 2.95549 1.63299 2.84286 1.63405C2.24365 1.64047 1.64275 1.6148 1.04467 1.64422C0.531065 1.66935 0.20105 1.47041 0 1.03938V0.612093ZM19.334 11.7467C19.347 11.7355 19.3599 11.7243 19.3729 11.713C19.3898 11.682 19.4146 11.6531 19.423 11.6205C19.6387 10.7734 19.8488 9.92527 20.0684 9.07925C20.39 7.84016 20.7177 6.60215 21.0433 5.36307H5.72176C5.80004 5.69196 5.87157 6.00801 5.95097 6.32193C6.1554 7.13051 6.36265 7.93803 6.56933 8.74608C6.80642 9.67446 7.0559 10.6002 7.27216 11.5333C7.3189 11.7355 7.40281 11.7553 7.57965 11.7553C11.1383 11.7521 14.6969 11.7531 18.2556 11.7526C18.6149 11.7526 18.9747 11.7483 19.334 11.7467Z" fill="#F77A40" />
                <path d="M18.1779 19.9973C16.6354 20.0534 15.308 18.74 15.3395 17.2325C15.3688 15.8463 16.5447 14.488 18.3609 14.5768C19.8409 14.649 21.0337 15.7533 21.0861 17.2041C21.1424 18.7523 19.7609 20.0502 18.1779 19.9973ZM17.0842 17.2726C17.0329 17.8625 17.6293 18.3897 18.1711 18.3732C18.8683 18.3523 19.3577 17.9309 19.3588 17.2886C19.36 16.6228 18.8762 16.2159 18.1773 16.2041C17.5691 16.1939 17.0701 16.6694 17.0842 17.2726Z" fill="#F77A40" />
                <path d="M7.77 19.9973C6.0591 20.0075 4.90348 18.6871 4.92038 17.2838C4.93784 15.811 6.0056 14.6875 7.5712 14.58C9.40768 14.4543 10.5723 15.8282 10.6613 17.0993C10.7767 18.7491 9.2821 20.0679 7.77 19.9973ZM7.79196 18.3742C8.50662 18.3555 8.95997 17.8421 8.93744 17.2737C8.91154 16.6111 8.46382 16.2052 7.72044 16.2062C7.12799 16.2073 6.62114 16.6843 6.65549 17.364C6.6814 17.8737 7.16966 18.4004 7.79196 18.3742Z" fill="#F77A40" />
              </svg>
            </div>
          </a>
          <!-- <a class="search" data-link="fnindex_search">
            <p>快速繳費</p>
            <svg width="21" height="8" viewBox="0 0 21 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.3536 4.35355C20.5488 4.15829 20.5488 3.84171 20.3536 3.64645L17.1716 0.464466C16.9763 0.269204 16.6597 0.269204 16.4645 0.464466C16.2692 0.659728 16.2692 0.976311 16.4645 1.17157L19.2929 4L16.4645 6.82843C16.2692 7.02369 16.2692 7.34027 16.4645 7.53553C16.6597 7.7308 16.9763 7.7308 17.1716 7.53553L20.3536 4.35355ZM0 4.5L20 4.5V3.5L0 3.5L0 4.5Z" fill="#F77A40"/>
            </svg>
          </a> -->
        </div>
      </div>
      <div class="hamburgerDiv">
        <div class="hamburger">
          <span></span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="fn_left_link">
  <!-- <a href="https://customer-test.sly-ha.com.tw/"> -->
  <a>
    <img src="{{ URL::asset('images/fnmessenger.png') }}" alt="">
  </a>
</div>