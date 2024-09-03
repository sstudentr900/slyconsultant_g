<style>
  .publicFnreserveWeekBomb{
    position: fixed;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.3);
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    visibility: hidden;
    z-index: 9;
  }
  .publicFnreserveWeekBomb.active{
    visibility: visible;
  }
  .publicFnreserveWeekBomb .box{
    max-width: 720px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
  }
  .publicFnreserveWeekBomb .box a{
    cursor: pointer;
  }
  .publicFnreserveWeekBomb .box .round{
    width: 200px;
    height: 200px;
    background: #3E36B0;
    border: 5px solid #FFFFFF;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
  }
  .publicFnreserveWeekBomb .box .round h4{
    font-size: 32px;
    line-height: 44px;
    text-align: center;
    letter-spacing: 0.15em;
    color: #FFFFFF;
    max-width: 78px;
  }
  .publicFnreserveWeekBomb .box .round.modify{
    background: #8595A8;
  }
  .publicFnreserveWeekBomb .box .round.cancel{
    background: #F47780;
  }
  .publicFnreserveWeekBomb .box .close{
    position: absolute;
    left: 50%;
    bottom: -120px;
    transform: translateX(-50%);
  }
</style>
<div class="publicFnreserveWeekBomb">
  <div class="box">
    <a href="{{ route('fnreserve_visit') }}" class="round establish">
      <h4>建立初診</h4>
    </a>
    <a href="{{ route('fnreserve_date') }}" class="round modify">
      <h4>修改預約</h4>
    </a>
    <a href="#" class="round cancel">
      <h4>取消看診</h4>
    </a>
    <a class="close">
      <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M39.4787 23.0384C40.1738 22.3433 40.1738 21.2164 39.4787 20.5213C38.7836 19.8262 37.6567 19.8262 36.9616 20.5213L37.6687 21.2284L36.9616 20.5213L30.5 26.9829L24.0384 20.5213C23.3433 19.8262 22.2164 19.8262 21.5213 20.5213C20.8262 21.2164 20.8262 22.3433 21.5213 23.0384L27.9829 29.5L21.5213 35.9616C20.8262 36.6567 20.8262 37.7836 21.5213 38.4787C22.2164 39.1738 23.3433 39.1738 24.0384 38.4787L30.5 32.0171L36.9616 38.4787C37.6567 39.1738 38.7836 39.1738 39.4787 38.4787L38.7716 37.7716L39.4787 38.4787C40.1738 37.7836 40.1738 36.6567 39.4787 35.9616L33.0171 29.5L39.4787 23.0384Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="30" cy="30" r="28.5" stroke="white" stroke-width="3"/>
      </svg>
    </a>
  </div>
</div>
<script>
</script>
