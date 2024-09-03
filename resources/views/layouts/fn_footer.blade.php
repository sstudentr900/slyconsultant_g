@once
@push('customStyle')
<style>
  .fn_footer {
    background: #232536;
    padding: 16px 20px;
  }

  .fn_footer p {
    text-align: center;
    color: #FFF;
    font-size: 16px;
    font-weight: 300;
    opacity: .6;
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<script>
  //購物車
  function car_number() {
    const buy = document.querySelector('.fn_navDiv .link .buy')
    if (!buy.length) false;
    const buyNumber = buy.querySelector('.number')
    const car = car_search({
      obj: 'car'
    })
    // console.log(car)
    if (car && car.length) {
      // console.log(`carlength,${car.length}`)
      buyNumber.classList.add('active')
      buyNumber.innerText = car.length
    } else {
      // console.log(`car,${car}`)
      buyNumber.classList.remove('active')
      buyNumber.innerText = 0
    }
  }

  function car_delet({
    obj,
    id
  }) {
    if (!id) {
      if (obj) {
        localStorage.removeItem(obj);
      } else {
        localStorage.clear();
      }
    } else {
      let getItem = car_search({
        obj
      })
      // console.log(`nowGetItem:${getItem}`)
      getItem = getItem.filter(item => item[0] != id)
      // console.log(`afterNowItem:${getItem}`)
      //更新
      localStorage.setItem(obj, JSON.stringify(getItem));
      // console.log(`after2NowItem:${ car_search({obj})}`)
    }
    //更新數量
    car_number()
  }

  function car_search({
    obj,
    id
  }) {
    if (!id) {
      return JSON.parse(localStorage.getItem(obj));
    } else {
      return car_search({
        obj
      }).find(item => {
        item[0] == id ? item : ''
      })
    }
  }

  function car_add({
    obj,
    array
  }) {
    //add
    const id = array[0]
    const value = array[1]
    const getItem = car_search({
      obj
    });
    const nowArray = getItem ? getItem : []
    let arrayPush = 0
    // console.log(`修改前nowArray:${nowArray},${id},${value}`)
    //有值
    if (nowArray.length) {
      nowArray.forEach((item, index) => {
        //console.log(item, index)
        if (item[0] == id) {
          nowArray[index][1] = Number(item[1]) + Number(value)
          arrayPush = 1
        }
      })
    }
    if (!arrayPush || !nowArray.length) {
      nowArray.push([id, Number(value)])
    }
    localStorage.setItem(obj, JSON.stringify(nowArray));
    //add
    // car_add({obj:'car',array:[this.dataset.id,Number(pop_input.value)]})
    // console.log(`car_search:${car_search({obj:'car'})}`)
  }
  //公告
  function placardFn() {
    @isset($placard)
    @if($placard)
    alert('{{ $placard }}')
    @endif
    @endisset
  }
</script>
@endpush
@endonce
<div class="fn_footer">
  <p>馨琳揚企業組織 版權所有 © SinLinYang All Rights Reserved</p>
</div>
<script>
  //頁面加载完開始
  document.onreadystatechange = function() {
    if (document.readyState == 'complete') {
      placardFn(); //公告
      car_number();
      navFn(); //選單
    }
  }
</script>