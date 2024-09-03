// fnreserve_date 
//通過日曆物件去呼叫自身的init方法
// calendar.init(document.querySelector('.publicCalendar'));
const calendar = {
  nowYear: null,
  nowMonth: null,
  todyDate: null,
  currentDate: null,//選取日期
  currentTime: [],//選取時間
  dayTable: null, //日的陣列
  couple:null,
  //初始化函數
  init(form,date,couple) {
    this.todyDate = date;
    this.currentDate = date;
    // console.log(couple)
    this.couple = couple=='n'?'1':'2';
    //1獲取日陣列
    this.dayTable=form.querySelectorAll('.days li');
    //2建立日曆,傳入當前時間
    this.createCalendar(form,new Date(date));
    var nextMon=form.querySelector('.nex');
    var preMon=form.querySelector('.pre');
    // console.log(calendar)
    preMon.onclick=function(){
      //不能小於當前年月
      // console.log(calendar.nowYear+'/'+(calendar.nowMonth+1)+'/1',calendar.todyDate)
      if(new Date(calendar.nowYear+'/'+(calendar.nowMonth+1)+'/1')>new Date(calendar.todyDate)){
        calendar.clearCalendar(form)
        calendar.createCalendar(form,new Date(calendar.nowYear,calendar.nowMonth-1,1))
      }
    }
    nextMon.onclick=function(){
      calendar.clearCalendar(form)
      calendar.createCalendar(form,new Date(calendar.nowYear,calendar.nowMonth+1,1))
      // console.log(calendar)
    }
    this.dayTable.forEach(day=>{
      //選取日期
      day.onclick=function(e){
        let currentDateOld = calendar.nowYear+'/'+(calendar.nowMonth+1)+'/'+e.target.textContent
        // console.log('選取日期不能小於今天',calendar.todyDate,currentDate,calendar.todyDate<=currentDate)
        if(calendar.todyDate <= currentDateOld ){
          calendar.currentDate = currentDateOld;
          calendar.clearCalendar(form)
          calendar.createCalendar(form,new Date(calendar.nowYear,calendar.nowMonth,1))
          // console.log('calendar.currentDate',calendar.currentDate)
          calendar.updateDate()
        }
      }
    })
    calendar.updateTime()
  },
  // 清除日曆資料
  clearCalendar(form){
    var tds=form.querySelectorAll('.days li');
    for (var i = 0; i < tds.length; i++) {
      tds[i].innerHTML='';
      // 清除今天的樣式
      tds[i].className='';
    }
  },
  // 生成日曆  from表  date日期
  createCalendar(form,date){
    //獲取此時的年份
    this.nowYear = date.getFullYear(); 
    //獲取此時的月份
    this.nowMonth = date.getMonth(); 
    //年份月份寫入日曆
    form.querySelector('.calendarTitle').innerHTML = this.nowYear+"年"+ (this.nowMonth+1) +"月";
    //獲取本月的天數
    var dataNum= this.getDateLen(this.nowYear,this.nowMonth-1);
    var fristDay = this.getFristDay(this.nowYear,this.nowMonth-1);
    // 迴圈將每一天的天數寫入到日曆中
    // 讓i表示日期。
    for (var i = 1; i <= dataNum; i++) {
      this.dayTable[fristDay+i-1].innerHTML= '<p>'+i+'</p>';
      const nowData = this.nowYear+'/'+(this.nowMonth+1)+'/'+i;
      // console.log(nowData,this.todyDate)
      if(nowData==this.todyDate+''){  
        //將當期元素設定為today
        this.dayTable[i+fristDay-1].classList.add("tody");
      }
      if(nowData==this.currentDate+''){  
        //選取元素設定為active
        this.dayTable[i+fristDay-1].classList.add("active");
      }
    }
  },
  // 獲取本月份的天數
  getDateLen(year,month){
    //獲取下個月的第一天
    const nextMonth=new Date(year,month+1,1);
    // 設定下月第一天的小時-1，也就是上個月最後一天的小時數，隨便減去一個值不要超過24小時
    nextMonth.setHours(nextMonth.getHours()-1);
    //獲取此時下個月的日期,就是上個月最後一天.
    return nextMonth.getDate();
  },
  // 獲取本月第一天為星期幾。
  getFristDay(year,month){
    const fristDay=new Date(year,month+1,1);
    return fristDay.getDay();
  },
  //更新時間
  updateTime(){
    const clinic = document.querySelector('.clinic')
    let labels = clinic.querySelectorAll('label')
    let inputs = clinic.querySelectorAll('input')
    calendar.currentTime = [];
    // console.log(inputs)
    labels.forEach((label,index)=>{
      // console.log(label)
      label.addEventListener('click',function(e){
        // e.stopPropagation();
        e.preventDefault();
        if(!this.querySelector('input').checked){
          let number = Array.from(inputs).filter((input,index)=> input.checked==true).length
          // console.log(number,calendar.couple,number < calendar.couple)
          if(number<1 && calendar.couple==1){
            //只能選一個時段 60分
            this.querySelector('input').checked=true //選擇
          }else if(number<1 && calendar.couple==2){
            //只能選一個時段 120分 要有連續時間
            let nowTime = (this.querySelector('input').value.split(':')[0])*1;
            let nexTime =  Array.from(this.closest('div').querySelectorAll('input')).filter(el=>(el.value.split(':')[0])*1==nowTime+1);
            if(nexTime.length){
              this.querySelector('input').checked=true //選擇
              nexTime[0].checked=true
              console.log( nexTime[0])
            }else{
              alert('該時間不能一次預約120分')
            }
          }
        }else{
          this.querySelector('input').checked=false
        }
      })
    })
  },
  //更新日期
  updateDate(){
    // console.log('更新時間',calendar.currentDate)
    fetch('./reserve/date_updateTime', {
      method: 'post', 
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify({
        institutions_id: institutions_id.value,
        doctor_id:doctor_id.value,
        currentDate: calendar.currentDate,
      })
    }).then(response=>{
      // 這裡會得到一個 ReadableStream 的物件
      // console.log(response);
      // 可以透過 blob(), json(), text() 轉成可用的資訊
      return response.json(); 
    }).then((jsonData) => {
      const clinic = document.querySelector('.clinic')
      clinic.innerHTML='';
      // console.log(jsonData)
      jsonData.forEach((item,index)=>{
        // console.log(index,item)
        let holds = [];
        item.hold.forEach((hold,index)=>{
          holds.push(`<label>
            <input type="checkbox" name="time[]" value="${hold['time']}">
            <p>${hold['time']}</p>
          </label>`)
        })
        // console.log(holds.join(''))
        clinic.insertAdjacentHTML('beforeend',
          `<div class="clinic${index}">
            <h4>${item['name']}</h4>
            ${holds.join('')}
          </div>`
        )
      })
      calendar.updateTime()
    }).catch((err) => {
      console.log('錯誤:', err);
    })
  }
} 
