<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controllers;
//接收資料
use Illuminate\Http\Request;
//加密
use Illuminate\Support\Facades\Hash;
//File
// use Illuminate\Support\Facades\File;
//自訂函數
use App\Http\Controllers\CustomFn;
//DB
use DB;
use App\Models\Manager;

class BamanagerController extends Controller
{

  //共用
  public $result = [
    'end' => 8, //顯示數量
    'release' => 'y',
  ];
  //要驗證的值
  public $validate = [
    'cover' => 'required',
    'account' => 'required|email|max:50',
    'password' => 'required|max:20',
    'name' => 'required|max:20',
    'phone' => 'required|digits_between:6,20',
    'release' => 'required|in:y,n',
  ];
  public function search()
  {
    $result = CustomFn::search($this->result['main_db']::count(), $this->result['end'], $this->result['pageNow']);
    $datas = $this->result['main_db']::offset($result['startValue'])->limit($result['endValue'])->orderBy('id', 'desc')->get();
    $this->result['datas'] =  $datas;
    $this->result['pageStart'] =  $result['pageStart'];
    $this->result['pageTotle'] =  $result['pageTotle'];
    return view($this->result['viewName'], $this->result);
  }
  public function addpost($request)
  {
    //接收驗證資料
    $input = $request->validate($this->validate);

    //驗證帳號
    $user = Manager::where('account', $input['account'])->first();
    if ($user) {
      return CustomFn::errorFn($this->result['viewNameError'], [
        'account' => [
          '帳號重複',
        ]
      ]);
    }

    // save
    // $this->result['main_db']::create([
    //   'cover' => CustomFn::imgAdd($input['cover'],'bamanager'),
    //   'account' => $input['account'],
    //   'password' => Hash::make($input['password']),
    //   'name' => $input['name'],
    //   'phone' => $input['phone'],
    //   'release' => $input['release'],
    // ]);

    return redirect($this->result['viewName']);
  }
  public function updatepost(Request $request)
  {
    //接收驗證資料 需濾掉password
    unset($this->validate["password"]);
    // dd($this->validate);
    $input = $request->validate($this->validate);


    //驗證帳號
    $user = Manager::where('account', $input['account'])->get()->count();
    // dd($user);
    if ($user > 1) {
      return CustomFn::errorFn($this->result['viewNameError'], [
        'account' => [
          '帳號重複',
        ]
      ]);
    }

    //save
    // $data = $this->result['main_db']::find($this->result['main_id']);
    // $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,'bamanager');
    // if($imgUpdata){
    //     $data->cover = $imgUpdata;
    // }
    // $data->account = $input['account'];
    // $data->name = $input['name'];
    // $data->phone = $input['phone'];
    // $data->release = $input['release'];
    // $data->save();

    //回到更新頁
    return redirect($this->result['viewName']);
  }

  //後台管員 Manager  ----------------------------------------------------------------
  public function bamanager_search($pageNow = 1)
  {
    $this->result['active'] = 'bamanager';
    $this->result['mainTitle'] = '後台管員';
    $this->result['pageNow'] = $pageNow; //第一頁
    $this->result['main_db'] = new Manager;
    $this->result['viewName'] = 'bamanager';
    $this->result['forms'] = json_decode('[
      {"name":"id","text":"#","type":"text"},
      {"name":"updated_at","text":"修改時間","type":"text"},
      {"name":"cover","text":"圖片","type":"img"},
      {"name":"account","text":"帳號","type":"text"},
      {"name":"name","text":"姓名","type":"text"},
      {"name":"phone","text":"電話","type":"text"},
      {"name":"release","text":"狀態","type":"release","v_text":"y","y_text":"使用","n_text":"停用"},
      {"name":"modify","text":"動作","type":"modify"}
    ]', true);
    return $this->search();
  }
  public function bamanager_add()
  {
    $this->result['active'] = 'bamanager_add';
    $this->result['mainTitle'] = '後台管員_新增';
    $this->result['forms'] = array(
      ['type' => 'file', 'id' => 'cover', 'label' => '管員圖片'],
      ['type' => 'text', 'id' => 'account', 'label' => '管員帳號'],
      ['type' => 'password', 'id' => 'password', 'label' => '密碼'],
      ['type' => 'text', 'id' => 'name', 'label' => '管員姓名'],
      ['type' => 'tel', 'id' => 'phone', 'label' => '管員電話'],
      ['type' => 'release', 'id' => 'release', 'label' => '管員狀態'],
    );
    return view('bamanager_update', $this->result);
  }
  public function bamanager_addpost(Request $request)
  {
    $this->result['main_db'] = new Manager;
    $this->result['viewName'] = 'bamanager';
    $this->result['viewNameError'] = 'bamanager_add';
    return $this->addpost($request);
  }
  public function bamanager_update($id)
  {
    $this->result['active'] = 'bamanager_update';
    $this->result['mainTitle'] = '後台管員_修改';
    $this->result['datas'] = Manager::find($id);
    $this->result['forms'] = array(
      ['type' => 'file', 'id' => 'cover', 'label' => '管員圖片'],
      ['type' => 'text', 'id' => 'account', 'label' => '管員帳號'],
      ['type' => 'text', 'id' => 'name', 'label' => '管員姓名'],
      ['type' => 'tel', 'id' => 'phone', 'label' => '管員電話'],
      ['type' => 'release', 'id' => 'release', 'label' => '管員狀態'],
    );
    return view('bamanager_update', $this->result);
  }
  public function bamanager_updatepost(Request $request, $id, $pageId)
  {
    $this->result['main_db'] = new Manager;
    $this->result['main_id'] = $id;
    $this->result['pageId'] = $pageId;
    $this->result['viewName'] = 'bamanager/' . $pageId;
    $this->result['viewNameError'] = 'bamanager_update/' . $id . '/' . $pageId;
    return $this->updatepost($request);
  }
  public function bamanager_password($id, $pageId, $value)
  {
    //save
    // $data = Manager::find($id);
    // $data->password = Hash::make($value);
    // $data->save();

    return redirect('bamanager/' . $pageId);
  }
  public function bamanager_delete($id, $pageId)
  {
    //delete
    // $data = Manager::find($id);
    // CustomFn::imgDelet($data);
    // $data->delete();

    return redirect('bamanager/' . $pageId);
  }
}
