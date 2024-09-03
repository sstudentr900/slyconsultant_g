<style>
  /*publicLoad 加載-----------------------------------------------------------------------*/
  .publicLoad {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      /* background: #fff; */
      background: rgba(255,255,255,.95);
      /* background: linear-gradient(180deg, #FFF1CC 3.12%, rgba(255, 233, 176, 0.262661) 47.4%, rgba(253, 242, 203, 0) 100%); */
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      transition: opacity .35s ease-out;
  }
  .publicLoad.active {
      opacity: 1;
      visibility: visible;
  }
  .publicLoad .load{
      height: 60px;
      width: 60px;
      position: relative;
  }
  .publicLoad .load div{
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0;
      top: 0;
  }
  .publicLoad .load div:nth-child(2){
      -webkit-transform: rotate(30deg);
      -ms-transform: rotate(30deg);
      transform: rotate(30deg);
  }
  .publicLoad .load div:nth-child(3){
      -webkit-transform: rotate(60deg);
      -ms-transform: rotate(60deg);
      transform: rotate(60deg);
  }
  .publicLoad .load div:nth-child(4){
      -webkit-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
      transform: rotate(90deg);
  }
  .publicLoad .load div:nth-child(5){
      -webkit-transform: rotate(120deg);
      -ms-transform: rotate(120deg);
      transform: rotate(120deg);
  }
  .publicLoad .load div:nth-child(6){
      -webkit-transform: rotate(150deg);
      -ms-transform: rotate(150deg);
      transform: rotate(150deg);
  }
  .publicLoad .load div:nth-child(7){
      -webkit-transform: rotate(180deg);
      -ms-transform: rotate(180deg);
      transform: rotate(180deg);
  }
  .publicLoad .load div:nth-child(8){
      -webkit-transform: rotate(210deg);
      -ms-transform: rotate(210deg);
      transform: rotate(210deg);
  }
  .publicLoad .load div:nth-child(9){
      -webkit-transform: rotate(240deg);
      -ms-transform: rotate(240deg);
      transform: rotate(240deg);
  }
  .publicLoad .load div:nth-child(10){
      -webkit-transform: rotate(270deg);
      -ms-transform: rotate(270deg);
      transform: rotate(270deg);
  }
  .publicLoad .load div:nth-child(11){
      -webkit-transform: rotate(300deg);
      -ms-transform: rotate(300deg);
      transform: rotate(300deg);
  }
  .publicLoad .load div:nth-child(12){
      -webkit-transform: rotate(330deg);
      -ms-transform: rotate(330deg);
      transform: rotate(330deg);
  }
  .publicLoad .load div:before {
      content: '';
      display: block;
      margin: 0 auto;
      width: 15%;
      height: 15%;
      background-color: #EA6200;
      border-radius: 100%;
      -webkit-animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
      animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
  }
  .publicLoad .load div:nth-child(2):before {
      -webkit-animation-delay: -1.1s;
      animation-delay: -1.1s;
  }
  .publicLoad .load div:nth-child(3):before {
      -webkit-animation-delay: -1s;
      animation-delay: -1s;
  }
  .publicLoad .load div:nth-child(4):before {
      -webkit-animation-delay: -0.9s;
      animation-delay: -0.9s;
  }
  .publicLoad .load div:nth-child(5):before {
      -webkit-animation-delay: -0.8s;
      animation-delay: -0.8s;
  }
  .publicLoad .load div:nth-child(6):before {
      -webkit-animation-delay: -0.7s;
      animation-delay: -0.7s;
  }
  .publicLoad .load div:nth-child(7):before {
      -webkit-animation-delay: -0.6s;
      animation-delay: -0.6s;
  }
  .publicLoad .load div:nth-child(8):before {
      -webkit-animation-delay: -0.5s;
      animation-delay: -0.5s;
  }
  .publicLoad .load div:nth-child(9):before {
      -webkit-animation-delay: -0.4s;
      animation-delay: -0.4s;
  }
  .publicLoad .load div:nth-child(10):before {
      -webkit-animation-delay: -0.3s;
      animation-delay: -0.3s;
  }
  .publicLoad .load div:nth-child(11):before {
      -webkit-animation-delay: -0.2s;
      animation-delay: -0.2s;
  }
  .publicLoad .load div:nth-child(12):before {
      -webkit-animation-delay: -0.1s;
      animation-delay: -0.1s;
  }
  @-webkit-keyframes sk-circleFadeDelay {
      0%, 39%, 100% { opacity: 0; }
      40% { opacity: 1; }
  }
  @keyframes sk-circleFadeDelay {
      0%, 39%, 100% { opacity: 0; }
      40% { opacity: 1; } 
  }
</style>
<div class="publicLoad active">
    <div class="load">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>