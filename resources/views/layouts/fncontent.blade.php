<style>
  .publicContent{
    padding: 30px 40px 55px calc(40px + 100px) ;
    min-height: 100vh;
    /* background: linear-gradient(180deg, #FFF1CC 3.12%, rgba(255, 233, 176, 0.262661) 47.4%, rgba(253, 242, 203, 0) 100%); */
  }
  .publicContent>.mainTitle{
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 32px;
  }
  .publicContent>.mainTitle>h4{
    font-weight: 700;
    font-size: 36px;
  }
  .publicContent>.mainTitle>p{
    font-weight: 700;
    font-size: 24px;
  }
  .publicContent>.mainTitle>p>span{
    margin-left: 10px;
  }
</style>
<div class="publicContent">
  <div class="mainTitle">
    <h4>O O 心理治療所</h4>
    <p><span id='nowDate'>2022 / 05 / 26</span><span id='nowTime'>08:53 AM</span></p>
  </div>
  @yield('content')
</div>
<script>
  globalTime = {}
  document.addEventListener("DOMContentLoaded", () => {
    console.log("心理治療所");
    const startTime = function(){
      let now = new Date()
      let ye = now.getFullYear().toString()//年
      let mo = now.getMonth()//月(一月 = 0, 二月 = 1, 三月 = 2, 四月 = 3, 五月 = 4, 六月 = 5, 七月 = 6...十月 = 9, 十一月 = 10, 十二月 = 11)
      let da = now.getDate()//日(1-31)
      let we = now.getDay()//周(星期日 = 0, 星期一 = 1, 星期二 = 2, 星期三 = 3, 星期四 = 4,星期五 = 5, 星期六 = 6)
      let hh = now.getHours()//小時(0-24)
      let mm = now.getMinutes()//分(0-59)
      // let ss = now.getSeconds()//秒(0-59)
      let weekdays = "星期日,星期一,星期二,星期三,星期四,星期五,星期六".split(",");
      let months = "一月,二月,三月,四月,五月,六月,七月,八月,九月,十月,十一月,十二月".split(",");
      let ampm  = hh >= 12 ? 'PM' : 'AM';
      const nowDate =  document.getElementById('nowDate')
      const nowTime =  document.getElementById('nowTime')
      // const checkTime = function(i){
      //   if(i < 10) {
      //     i = "0" + i;
      //   }
      //   return i;
      // }
      // mm = checkTime(mm);
      months = months[mo];
      weekdays = weekdays[we];
      mo = mo+1;
      mo = mo.toString().padStart(2, '0');
      da = da.toString().padStart(2, '0');
      // ss = ss.toString().padStart(2, '0');
      hh = hh % 12;
      hh = hh ? hh : 12;
      mm = mm.toString().padStart(2, '0');
      hh = hh.toString().padStart(2, '0');
      nowTime.innerText = `${hh}:${mm} ${ampm}`;
      // nowTime.innerText = now.toLocaleTimeString();
      nowDate.innerText = now.toLocaleDateString();
      setTimeout(startTime, 60000);
      globalTime={
        'ye': ye,
        'mo': mo,
        'months': months,
        'da': da,
        'weekdays': weekdays,
        'hh': hh,
        'mm': mm,
        // 'ss': ss,
        'ampm': ampm,
      }
    }
    startTime()
  });
</script>