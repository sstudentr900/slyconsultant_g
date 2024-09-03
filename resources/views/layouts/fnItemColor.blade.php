<style>
  .publicItemColor{
    background: #F4F5FA;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    display: flex;
    padding: 30px;
    width: 100%;
  }
  .publicItemColor li{
    flex: 1;
    display: flex;
    justify-content: center;
    position: relative;
  }
  .publicItemColor li+li::after{
    content: '';
    position: absolute;
    top: 16px;
    left: 0;
    width: 1px;
    height: 40px;
    background: #979797;
  }
  .publicItemColor li h4{
    color: #3E36B0;
    font-weight: 600;
    font-size: 21px;
  }
  .publicItemColor li p{
    color: #726CC9;
    font-weight: 600;
    font-size: 26px;
  }
  .publicItemColor li.red h4,
  .publicItemColor li.red p{
    color: #AC0000;
  }
  .publicItemColor li.red h4,
  .publicItemColor li.red p{
    color: #AC0000;
  }
  .publicItemColor li.green h4,
  .publicItemColor li.green p{
    color: #259693;
  }
  .publicItemColor li.yellow h4,
  .publicItemColor li.yellow p{
    color: #E48900;
  }
  .fnItemcolor .publicGridCell a{
    background: #3E36B0;
    border: 3px solid #FFFFFF;
    border-radius: 15px;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-weight: 600;
    font-size: 21px;
    padding: 20px;
  }
  .fnItemcolor .publicGridCell a svg{
    margin-bottom: 20px;
  }
  .fnItemcolor .publicGridCell:last-child{
    flex: 0 0 150px;
  }
</style>
<div class="publicGrid fnItemcolor">
  <div class="publicGridCell">
    <ul class="publicItemColor">
      <li class="Purple">
        <div class="text">
          <h4>目前個案數</h4>
          <p>200</p>
        </div>
      </li>
      <li class="Purple">
        <div class="text">
          <h4>已結案</h4>
          <p>130</p>
        </div>
      </li>
      <li class="Purple">
        <div class="text">
          <h4>約談中</h4>
          <p>42</p>
        </div>
      </li>
    </ul>
  </div>
  <div class="publicGridCell">
    <ul class="publicItemColor">
      <li class="red">
        <div class="text">
          <h4>高風險個案</h4>
          <p>5</p>
        </div>
      </li>
      <li class="green">
        <div class="text">
          <h4>穩定個案</h4>
          <p>27</p>
        </div>
      </li>
      <li class="yellow">
        <div class="text">
          <h4>需關懷個案</h4>
          <p>10</p>
        </div>
      </li>
    </ul>
  </div>
  <div class="publicGridCell">
    <a href="#">
      <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.082 2.94262C18.082 1.86974 17.2122 1 16.1393 1C15.0665 1 14.1967 1.86974 14.1967 2.94262V14.1967H2.94262C1.86974 14.1967 1 15.0665 1 16.1393C1 17.2122 1.86974 18.082 2.94262 18.082H14.1967V29.3361C14.1967 30.4089 15.0665 31.2787 16.1393 31.2787C17.2122 31.2787 18.082 30.4089 18.082 29.3361V18.082H29.3361C30.4089 18.082 31.2787 17.2122 31.2787 16.1393C31.2787 15.0665 30.4089 14.1967 29.3361 14.1967H18.082V2.94262Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      新增個案
    </a>
  </div>
</div>