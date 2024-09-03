@once
@push('customStyle')
<style>
  .publicMainNav{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 15px 0;
    margin-bottom: 0;
  }
  .publicMainNav .title{
    /* background: #A1804C; */
    /* background: #666DFF; */
    background: #f77a40;
    padding: 20px 60px;
    border-radius: 3px;
    color: #fff;
    font-size: 18px;
    box-shadow: 0 14px 26px -12px rgb(111 111 111 / 42%), 0 4px 23px 0px rgb(105 105 105 / 12%), 0 8px 10px -5px rgb(132 132 132 / 20%);
    margin-top: -40px;
  }
  .publicMainNav .publicBtn{
    padding: 8px 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 3px;
    cursor: pointer;
    color: #666;
    background: #ffffff;
  }
  .publicMainNav .publicBtn.active,
  .publicMainNav .publicBtn:hover {
    border: 1px solid #EA6200;
    box-shadow: 0 14px 26px -12px rgb(100 100 100 / 42%), 0 4px 23px 0px rgb(100 100 100 / 12%), 0 8px 10px -5px rgb(100 100 100 / 20%);
    background-color: #EA6200;
    border: 1px solid #EA6200;
    color: #fff;
  }
  .publicMainNav .publicBtn i {
    width: 13px;
    margin-right: 5px;
    font-size: 0;
  }
  .publicMainNav .publicBtn i svg{
    fill: #666;
  }
  .publicMainNav .publicBtn.active i svg,
  .publicMainNav .publicBtn:hover i svg{
    fill: #fff;
  }
</style>
@endpush
@endonce
<div class="publicMainNav">
    <div class="title">
        <h4>{{ $mainTitle }}</h4>
    </div>
    @if($addbtn=='y')
      <a class="publicBtn" href="{{ URL::asset($active.'_add') }}">
          <i><svg viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"></path></svg></i>新增
      </a>
    @endif
</div>