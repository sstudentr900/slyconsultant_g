<style>
  .publicFnreserveWeekTop .top .buttons,
  .publicFnreserveWeekTop .top .title,
  .publicFnreserveWeekTop .top{
    display: flex;
    align-items: center;
  }
  .publicFnreserveWeekTop .top{
    justify-content: space-between;
    padding-bottom: 24px;
    border-bottom: 2px solid #D9D9D9;
  }
  .publicFnreserveWeekTop .top .title h4{
    font-weight: 800;
    font-size: 30px;
    color: #211C6B;
    margin-right: 42px;
  }
  .publicFnreserveWeekTop .top .title label span{
    padding: 6px 12px 6px 28px;
    color: #242424;
    border-radius: 5px;
    font-weight: 300;
    font-size: 15px;
    position: relative;
    margin-left: 8px;
    cursor: pointer;
  }
  .publicFnreserveWeekTop .top .title label span::after{
    content: '';
    width: 8px;
    height: 8px;
    background: #F47780;
    position: absolute;
    border-radius: 8px;
    top: 50%;
    transform: translateY(-50%);
    left: 10px;
  }
  .publicFnreserveWeekTop .top .title label span:hover,
  .publicFnreserveWeekTop .top .title label input:checked+span{
    color: #fff;
    background: #8B8B8B;
  }
  .publicFnreserveWeekTop .top .title .clinic2 span::after{
    background: #2DB5B2;
  }
  .publicFnreserveWeekTop .top .title .clinic3 span::after{
    background: #EF9C60;
  }
  .publicFnreserveWeekTop .top .title .clinic4 span::after{
    background: #4C76C6;
  }
  .publicFnreserveWeekTop .top .publicCheckbox{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 8px;
  }
  .publicFnreserveWeekTop .top .publicCheckbox input{
    display: none;
  }
  .publicFnreserveWeekTop .top .buttons a{
    font-weight: 400;
    font-size: 18px;
    color: #fff;
    padding: 8px 32px;
    background: #8595A8;
    border-radius: 15px;
    cursor: pointer;
  }
  .publicFnreserveWeekTop .top .buttons a.add{
    background: #3E36B0;
    margin-left: 8px;
  }
  .publicFnreserveWeekTop .middle{
    display: flex;
    align-items: center;
    /* justify-content: space-between; */
    padding: 24px 0;
  }
  .publicFnreserveWeekTop .middle>div{
    margin-left: 10px;
  }
  .publicFnreserveWeekTop .middle .date input,
  .publicFnreserveWeekTop .middle .name input,
  .publicFnreserveWeekTop .middle select{
    width: 160px;
    /* width: 100%; */
    background: #F8F8F8;
    border: 1px solid #BEC4C6;
    border-radius: 10px;
    color: #8595A8;
    font-size: 16px;
    padding: 11px 20px;
    height: 42px;
    font-weight: bold;
  }
  .publicFnreserveWeekTop .middle select:focus{
    outline: none;
  }
  /* .publicFnreserveWeekTop .middle .date{
    width: 100%;
    max-width: 170px;
  } */
  .publicFnreserveWeekTop .middle .date{
    /* user-select: none;
    background: #F8F8F8;
    border: 1px solid #BEC4C6;
    border-radius: 10px;
    color: #8595A8;
    padding: 12px;
    font-size: 16px;
    font-weight: 500;
    width: 100%; */
    margin-left: 0;
  }
  .publicFnreserveWeekTop .middle .date input::-webkit-calendar-picker-indicator { 
    opacity: 0.5;
  }
  .publicFnreserveWeekTop .middle .publicMultiSelect{
    position: relative;
    cursor: pointer;
  }
  /* .publicFnreserveWeekTop .middle .publicMultiSelect .selectBox select{
    background: #F8F8F8;
    border: 1px solid #BEC4C6;
    border-radius: 10px;
    color: #8595A8;
    font-size: 16px;
    padding: 11px 20px;
    height: 42px;
    width: 100%;
    font-weight: bold;
  }
  .publicFnreserveWeekTop .middle .publicMultiSelect .selectBox select:focus{
    outline: none;
  } */
  .publicFnreserveWeekTop .middle .publicMultiSelect .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  } 
  .publicFnreserveWeekTop .middle .publicMultiSelect .checkboxes {
    display: none;
    border: 1px #dadada solid;
    position: absolute;
    width: 100%;
    z-index: 2;
    background: #f8f8f8;
    padding: 5px 10px;
  }
  .publicFnreserveWeekTop .middle .publicMultiSelect .checkboxes.active {
    display: block;
  }
  .publicFnreserveWeekTop .middle .publicMultiSelect .checkboxes label {
    display: block;
    cursor: pointer;
    user-select: none;
  }
  /* .publicFnreserveWeekTop .middle .name input{
    width: 160px;
    background: #F8F8F8;
    border: 1px solid #BEC4C6;
    border-radius: 10px;
    color: #8595A8;
    font-size: 16px;
    padding: 11px 20px;
    height: 42px;
  } */
  .publicFnreserveWeekTop .middle .btn{
    padding: 8px 20px;
    background: #8595A8;
    border: 1px solid #BEC4C6;
    border-radius: 10px;
    color: #FFF;
    font-size: 16px;
    margin-left: 10px;
    height: 42px;
  }
  .publicFnreserveWeekTop .middle .btn.reset{
    background: #F2F2F2;
    color: #666;
  }
</style>
<div class="publicFnreserveWeekTop">
  <div class="top">
    <div class="title">
      <h4>預約列表</h4>
      <div class="publicCheckbox">
        @foreach ($clinic_datas as $key=>$clinic)
          <label class="clinic{{$key+1}}">
            <input type="checkbox" name="clinic[]"  value="{{$clinic->id}}" {{ $key==0 ?'checked': '' }}/>
            <span>{{$clinic->name}}</span>
          </label>
        @endforeach
        <!-- <label class="clinic1">
          <input type="checkbox" name="clinic1" checked/>
          <span>診間1</span>
        </label>
        <label class="clinic2">
          <input type="checkbox" name="clinic2" />
          <span>診間2</span>
        </label>
        <label class="clinic3">
          <input type="checkbox" name="clinic3" />
          <span>診間3</span>
        </label>
        <label class="clinic4">
          <input type="checkbox" name="clinic4" />
          <span>診間4</span>
        </label> -->
      </div>
    </div>
    <div class="buttons">
      <a href="{{ route('fnreserve_search') }}" class="serch">搜尋</a>
      <a href="{{ route('fnreserve_add') }}" class="add">新增預約</a>
    </div>
  </div>
  <div class="middle">
    <div class="date">
      <input type="date" value="{{$today_date}}">
    </div>
    <div class="publicInstitutionsSelect">
      <select name="institutions" class="institutions" id='visit_institutions'>
        @foreach ($institutions_datas as $data)
          <option value="{{$data->id}}">{{$data->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="publicMultiSelect">
      <div class="selectBox">
        <select>
          <option>醫師選擇</option>
          <option>廖OO</option>
          <option>李OO</option>
          <option>何OO</option>
          <option>盧OO</option>
        </select>
        <div class="overSelect"></div>
      </div>
      <div class="checkboxes">
        <label for="one"><input type="checkbox" id="one" />廖OO</label>
        <label for="two"><input type="checkbox" id="two" />李OO</label>
        <label for="three"><input type="checkbox" id="three" />何OO</label>
        <label for="three"><input type="checkbox" id="three" />何OO</label>
      </div>
    </div>
    <div class="name">
      <input type="text" placeholder="個案姓名">
    </div>
    <a href="#" class="btn filter">篩選</a>
    <a href="#" class="btn reset">重置</a>
  </div>
</div>
<script>
  function institutionsSelect(datas){
    const institution = document.querySelector('.institutions');
    const publicMultiSelect = document.querySelector('.publicMultiSelect');
    const select = publicMultiSelect.querySelectorAll('select');
    const checkboxes = publicMultiSelect.querySelectorAll('.scheckboxeselect');
    const optionHtml = function(data){
      // console.log(data)
      select.innerHTML='';
      data['categoryName'].split(',').forEach(function(el){
        const array = el.split('/')
        let option = document.createElement('option');// <option value="1">22</option>
        option.setAttribute("value", array[0]);
        option.innerText=array[1]
        select.appendChild(option)
      })
    }
    institution.addEventListener('change',function(e){
      optionHtml(datas[(e.target.value-1)])
    })
    optionHtml(datas[0])
  }
  document.addEventListener("DOMContentLoaded", () => {
    // console.log('預約列表_周_top')

    //院所 醫師 select option
    institutionsSelect(<?php echo json_encode($institutions_datas);?>)

    //醫師選擇
    // const publicFnreserveWeekTop = document.querySelector('.publicFnreserveWeekTop')
    const publicMultiselect = document.querySelector(".publicMultiSelect");
    const selectBox = publicMultiselect.querySelector(".selectBox");
    selectBox.addEventListener('click',function(){
      const checkboxes = publicMultiselect.querySelector(".checkboxes");
      if (checkboxes.classList.contains('active')) {
        checkboxes.classList.remove('active')
      } else {
        checkboxes.classList.add('active')
      }
    })
  })
</script>
