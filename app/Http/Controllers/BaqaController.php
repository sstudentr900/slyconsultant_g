<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //接收資料
//use Illuminate\Support\Facades\Hash;//密碼加密
use Illuminate\Support\Facades\File; //File
use App\Http\Controllers\CustomFn; //自訂函數
use DB; //DB
use App\Models\Question as nowDB; //該頁db

class BaqaController extends Controller
{

  //共用
  public $result = [
    'active' => 'baqa', //class
    'mainTitle' => '常見問題', //標題
    'viewName' => 'baqa', //view
    'end' => 8, //顯示數量
    'release' => 'y', //狀態
  ];
  //要驗證的值
  public $validate = [
    'title' => 'required|max:100',
    'text' => 'required|max:255',
    'release' => 'required|in:y,n',
    'sort' => 'required',
  ];
  //
  public function baqa_search($pageNow = 1)
  {
    //設定第一頁
    $this->result['pageNow'] = $pageNow;

    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    $result = CustomFn::search(nowDB::count(), $this->result['end'], $this->result['pageNow']);

    //取得資料
    $this->result['datas'] = nowDB::offset($result['startValue'])->limit($result['endValue'])->orderBy('id', 'ASC')->get();

    $this->result['pageStart'] =  $result['pageStart'];
    $this->result['pageTotle'] =  $result['pageTotle'];
    $this->result['forms'] = json_decode('[
      {"name":"id","text":"#","type":"text"},
      {"name":"sort","text":"排序","type":"text"},
      {"name":"updated_at","text":"修改時間","type":"text"},
      {"name":"title","text":"標題","type":"text"},
      {"name":"release","text":"狀態","type":"release","v_text":"y","y_text":"使用","n_text":"停用"},
      {"name":"modify","text":"動作","type":"modify"}
    ]', true);
    return view($this->result['viewName'], $this->result);
  }
  public function baqa_add()
  {
    $this->result['active'] = $this->result['active'] . '_add';
    $this->result['mainTitle'] = $this->result['mainTitle'] . '_新增';
    $this->result['sortValue'] = nowDB::max('id') + 1;
    $this->result['forms'] = array(
      ['type' => 'text', 'id' => 'title', 'label' => '標題'],
      ['type' => 'sort', 'id' => 'sort', 'label' => '排序'],
      ['type' => 'textarea', 'id' => 'text', 'label' => '內文'],
      ['type' => 'release', 'id' => 'release', 'label' => '狀態'],
    );
    return view($this->result['viewName'] . '_update', $this->result);
  }
  public function baqa_addpost(Request $request)
  {
    //接收驗證資料
    $input = $request->validate($this->validate);

    //新增資料
    // nowDB::create([
    //   'title' => $input['title'],
    //   'text' => $input['text'],
    //   'sort' => $input['sort'],
    //   // 'is_enable' => $input['release']=='y'?'1':'0',
    //   'release' => $input['release'],
    // ]);

    return redirect($this->result['viewName']);
  }
  public function baqa_update($id)
  {
    $this->result['active'] = $this->result['active'] . '_update';
    $this->result['mainTitle'] = $this->result['mainTitle'] . '_修改';
    $this->result['datas'] = nowDB::find($id);
    $this->result['forms'] = array(
      ['type' => 'text', 'id' => 'title', 'label' => '標題'],
      ['type' => 'sort', 'id' => 'sort', 'label' => '排序'],
      ['type' => 'textarea', 'id' => 'text', 'label' => '內文'],
      ['type' => 'release', 'id' => 'release', 'label' => '狀態'],
    );
    // $this->result['datas'] = nowDB::select('content as tinymce','title','cover','is_enable')->where('id',$id)->first();
    return view($this->result['viewName'] . '_update', $this->result);
  }
  public function baqa_updatepost(Request $request, $id, $pageId)
  {
    //接收驗證資料
    $input = $request->validate($this->validate);

    //更新資料
    // $data = nowDB::find($id);
    // // $imgUpdata = CustomFn::imgUpdata($input['cover'],$data,$this->result['active'],'uploads/activity-record-photo');
    // // if($imgUpdata){
    // //     $data->cover = $imgUpdata;
    // // }
    // $data->title = $input['title'];
    // $data->text = $input['text'];
    // $data->sort = $input['sort'];
    // // $data->is_enable = $input['release']=='y'?'1':'0';
    // $data->release = $input['release'];
    // $data->save();

    //回到更新頁
    return redirect($this->result['viewName'] . '/' . $pageId);
  }
  public function baqa_delete($id, $pageId)
  {
    // $data = nowDB::find($id);
    // // CustomFn::imgDelet($data,'uploads/activity-record-photo');
    // $data->delete();
    // // dd($this->result['viewName'].'/'. $pageId);

    return redirect($this->result['viewName'] . '/' . $pageId);
  }
}
