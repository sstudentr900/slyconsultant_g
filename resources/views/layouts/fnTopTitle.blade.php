@once
  @push('customStyle')
  <style>
    .fnTopTitle{
      display: flex;
      align-items: center;
    }
    .fnTopTitle p{
      color: rgba(56, 79, 125, 0.80);
      font-size: 18px;
      font-weight: 500;
    }
    .fnTopTitle .left{
      width: 60%;
    }
    .fnTopTitle .left p span{
      margin-right: 24px;
    }
    .fnTopTitle .left a{
      color: #211C6B;
      font-size: 30px;
      font-weight: 800;
      display: flex;
      align-items: center;
    }
    .fnTopTitle .left a svg{
      margin-right: 10px;
    }
    .fnTopTitle .right{
      width: 40%;
    }
    .fnTopTitle .right p{
      text-align: right;
    }
  </style>
  @endpush
@endonce
<div class="fnTopTitle">
  <div class="left">
    <a href="{{ isset($src)?route($src):'javascript:;' }}" class="link">
      @if(isset($src))<svg width="18" height="30" viewBox="0 0 18 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.9696 1.82159L16.9693 1.8213C16.6224 1.50171 16.1748 1.34849 15.737 1.34849C15.2992 1.34849 14.8517 1.50171 14.5048 1.8213L1.03071 14.2335L1.0304 14.2338C0.323195 14.8864 0.323195 15.9623 1.0304 16.6149L1.03071 16.6152L14.5048 29.0274L14.5051 29.0277C15.1899 29.6574 16.2841 29.6574 16.969 29.0277L16.969 29.0277L16.9696 29.0271C17.6768 28.3745 17.6768 27.2986 16.9696 26.646L16.9693 26.6457L4.78713 15.4243L16.9693 4.20297L16.9696 4.20267C17.6768 3.55009 17.6768 2.47418 16.9696 1.82159Z" fill="#211C6B" stroke="#211C6B"/></svg>@endif
      黃君君  (May)
    </a>
    <p><span>性別：女</span><span>出生年月日: 1990.12.31</span><span>年齡：32歲</span></p>
  </div>
  <div class="right">
    <p>建案單位：靛青色診所-台北總院</p>
    <p>個案來源：自願來訪</p>
  </div>
</div>