<style>
  .customRightLink{
    position: fixed;
    bottom: 5%;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 2;
  }
  .customRightLink a{
    cursor: pointer;
  }
  .customRightLink a+a{
    margin-top: 20px;
  }
</style>
<div class="customRightLink">
  <a href="https://webreg.tpech.gov.tw/RegOnline1_2.aspx?ZCode=K&DeptCode=1302&deptname=%e6%88%90%e7%99%ae%e9%98%b2%e6%b2%bb%e7%a7%91" target="_blank">
    <img src="{{ URL::asset('images/rightLink01.png')}}" alt="">
  </a>
  <a href="https://page.line.me/?accountId=018daquk&openerPlatform=native&openerKey=talkroom%3Aheader" target="_blank">
    <img src="{{ URL::asset('images/rightLink02.png')}}" alt="">
  </a>
  <a class="goTop">
    <img src="{{ URL::asset('images/rightLink03.png')}}" alt="">
  </a>
</div>
<script>
  // const goTopFn = function(){
  //   //instant 立刻,smooth 平滑
  //   console.log('goTop',behavior)
  //   let behaviorValue = behavior?'instant':'smooth'
  //   console.log('goTop',behaviorValue)
  //   window.scrollTo({
  //     top: 0, 
  //     behavior: 'smooth' //滚动速度
  //   })
  // }
  // let goTop = document.querySelector('.goTop')
  document.querySelector('.goTop').addEventListener('click',function(){
    window.scrollTo({
      top: 0, 
      behavior: 'smooth' //滚动速度,instant 立刻,smooth 平滑
    })
  })
</script>
