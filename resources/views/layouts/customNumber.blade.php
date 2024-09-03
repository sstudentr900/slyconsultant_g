@once
@push('customStyle')
<style>
  .customNumber{
    user-select: none;
    display: flex;
    border: 1px solid #eee;
    padding: 0 12px;
  }
  .customNumber .reduce,
  .customNumber .add{
    width: 20%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .customNumber .input{
    /* margin: 0 15px; */
    width: 60%;
    padding: 5px 10px;
  }
  .customNumber input{
    width: 100%;
    border: none;
    text-align: center;
  }
  /* Chrome, Safari, Edge, Opera */
  .customNumber input::-webkit-outer-spin-button,
  .customNumber input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  /* Firefox */
  .customNumber input{
    -moz-appearance: textfield;
  }
</style>
@endpush
@endonce
@once
@push('customScript')
<script>
  function quantity(){
    // console.log(`quantity`)
    const customNumber = document.querySelectorAll('.customNumber')
    if(!customNumber.length){return false;}
    customNumber.forEach(item=>{
      const input = item.querySelector('input[type="number"]');
      const btnReduce = item.querySelector('.reduce');
      const btnAdd = item.querySelector('.add');
      const min = input.getAttribute('min');
      btnAdd.addEventListener('click',function(){
        // console.log(`btnAdd`,input)
        input.value = parseFloat(input.value)+1
      })
      btnReduce.addEventListener('click',function(){
        // console.log(`btnReduce`,input)
        let oldValue = parseFloat(input.value);
        if (oldValue <= min) {
          oldValue = 1
        } else {
          oldValue = oldValue - 1;
        }
        input.value = oldValue
      });
    })
  }
</script>
@endpush
@endonce
<div class="customNumber">
  <div class="reduce">
    <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.79167 0C9.93056 0 10 0.111111 10 0.333333V1.66667C10 1.88889 9.93056 2 9.79167 2H0.208333C0.0694444 2 0 1.88889 0 1.66667V0.333333C0 0.111111 0.0694444 0 0.208333 0H9.79167Z" fill="#454545"/>
    </svg>
  </div>
  <div class="input">
    <input type="number" value="{{ isset($number)?$number:1 }}" step="1" min="1" name="number[]">
  </div>
  <div class="add">
    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.79167 4C9.93056 4 10 4.11111 10 4.33333V5.66667C10 5.88889 9.93056 6 9.79167 6H0.208333C0.0694444 6 0 5.88889 0 5.66667V4.33333C0 4.11111 0.0694444 4 0.208333 4H9.79167Z" fill="#454545"/>
    <path d="M6 9.79167C6 9.93056 5.88889 10 5.66667 10H4.33333C4.11111 10 4 9.93056 4 9.79167L4 0.208333C4 0.0694444 4.11111 -9.71341e-09 4.33333 0L5.66667 5.8282e-08C5.88889 6.79956e-08 6 0.0694445 6 0.208333L6 9.79167Z" fill="#454545"/>
    </svg>
  </div>
</div>