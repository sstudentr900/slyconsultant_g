<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //接收資料
//use Illuminate\Support\Facades\Hash;//密碼加密
use Illuminate\Support\Facades\File; //File
use App\Http\Controllers\CustomFn; //自訂函數
use DB; //DB
use App\Models\Service as nowDB; //該頁db

class BaserviceController extends Controller
{

  //共用
  public $result = [
    'active' => 'baservice', //class
    'mainTitle' => '服務項目', //標題
    'viewName' => 'baservice', //view
    'end' => 7, //顯示數量
    'release' => 'y', //狀態
  ];
  //要驗證的值
  public $validate = [
    'sort' => 'required',
    'title' => 'required|max:100',
    'text' => 'required|max:255',
    'cover' => 'required',
    'price' => 'required|max:100',
    'special_offer' => 'required|max:100',
    'release' => 'required|in:y,n',
  ];
  //
  public $forms = array(
    ['type' => 'file', 'id' => 'cover', 'label' => '圖片'],
    ['type' => 'text', 'id' => 'title', 'label' => '標題'],
    ['type' => 'sort', 'id' => 'sort', 'label' => '排序'],
    ['type' => 'number', 'id' => 'price', 'label' => '原價'],
    ['type' => 'number', 'id' => 'special_offer', 'label' => '特價'],
    ['type' => 'textarea', 'id' => 'text', 'label' => '內文'],
    ['type' => 'release', 'id' => 'release', 'label' => '狀態'],
  );
  //
  public function baservice_search($pageNow = 1)
  {
    //設定第一頁
    $this->result['pageNow'] = $pageNow;
    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    $result = CustomFn::search(nowDB::where('delete', 'n')->count(), $this->result['end'], $this->result['pageNow']);
    //取得資料
    $this->result['datas'] = nowDB::where('delete', 'n')->offset($result['startValue'])->limit($result['endValue'])->orderBy('id', 'ASC')->get();

    $this->result['pageStart'] =  $result['pageStart'];
    $this->result['pageTotle'] =  $result['pageTotle'];
    $this->result['forms'] = json_decode('[
      {"name":"id","text":"#","type":"text"},
      {"name":"sort","text":"排序","type":"text"},
      {"name":"updated_at","text":"修改時間","type":"text"},
      {"name":"cover","text":"圖片","type":"img"},
      {"name":"title","text":"標題","type":"text"},
      {"name":"release","text":"狀態","type":"release","v_text":"y","y_text":"使用","n_text":"停用"},
      {"name":"modify","text":"動作","type":"modify"}
    ]', true);
    return view($this->result['viewName'], $this->result);
  }
  public function baservice_add()
  {
    $this->result['active'] = $this->result['active'] . '_add';
    $this->result['mainTitle'] = $this->result['mainTitle'] . '_新增';
    $this->result['sortValue'] =  nowDB::max('id') + 1;
    $this->result['forms'] = $this->forms;
    return view($this->result['viewName'] . '_update', $this->result);
  }
  public function baservice_addpost(Request $request)
  {
    //接收驗證資料
    $input = $request->validate($this->validate);
    // dd($input);

    // nowDB::create([
    //   'cover' => CustomFn::imgAdd($input['cover'],'baservice'),
    //   'title' => $input['title'],
    //   'text' => $input['text'],
    //   'sort' => $input['sort'],
    //   'price' => $input['price'],
    //   'special_offer' => $input['special_offer'],
    //   'release' => $input['release'],
    // ]);

    return redirect($this->result['viewName']);
  }
  public function baservice_update($id)
  {
    $this->result['active'] = $this->result['active'] . '_update';
    $this->result['mainTitle'] = $this->result['mainTitle'] . '_修改';
    $this->result['datas'] = nowDB::find($id);
    $this->result['forms'] = $this->forms;
    return view($this->result['viewName'] . '_update', $this->result);
  }
  public function baservice_updatepost(Request $request, $id, $pageId)
  {
    //接收驗證資料
    $input = $request->validate($this->validate);

    //更新資料
    // $data = nowDB::find($id);
    // $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,$this->result['active']);
    // if($imgUpdata){
    //     $data->cover = $imgUpdata;
    // }
    // $data->title = $input['title'];
    // $data->text = $input['text'];
    // $data->sort = $input['sort'];
    // $data->price = $input['price'];
    // $data->special_offer = $input['special_offer'];
    // $data->release = $input['release'];
    // $data->save();

    //回到更新頁
    return redirect($this->result['viewName'] . '/' . $pageId);
  }
  public function baservice_delete($id, $pageId)
  {
    // $data = nowDB::find($id);
    // $data->delete = 'y';
    // $data->save();
    // // CustomFn::imgDelet($data);
    // // $data->delete();
    // // dd($this->result['viewName'].'/'. $pageId);

    return redirect($this->result['viewName'] . '/' . $pageId);
  }
}
