<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //接收資料
//use Illuminate\Support\Facades\Hash;//密碼加密
use Illuminate\Support\Facades\File; //File
use App\Http\Controllers\CustomFn; //自訂函數
use Illuminate\Support\Facades\DB;
use App\Models\Record as nowDB; //該頁db
use App\Models\Purchaser as db_pu;
use App\Models\Service as db_se;
use App\Models\Orderlist as db_or;

class BacarController extends Controller
{

  //共用
  public $result = [
    'active' => 'bacar', //class
    'mainTitle' => '購物訂單', //標題
    'viewName' => 'bacar', //view
    'end' => 8, //顯示數量
    'release' => 'y', //狀態
  ];
  //要驗證的值
  public $validate = [
    'title' => 'required|max:100',
    'text' => 'required|max:255',
    'release' => 'required|in:y,n',
  ];
  //
  public function bacar_search($pageNow = 1)
  {
    //設定第一頁
    $this->result['pageNow'] = $pageNow;

    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    $result = CustomFn::search(nowDB::count(), $this->result['end'], $this->result['pageNow']);

    // 子查询操作
    // DB::raw("(SELECT group_concat(service.id,service.title) FROM service where orderlist.service_id=service.id) as orderlist")

    //取得資料
    $this->result['datas'] = nowDB::select(
      'record.id',
      'record.merchant_no',
      'record.trade_no',
      'record.payment_type',
      'record.state',
      'record.created_at',
      'record.totle',
      'purchaser.id as pid',
      'purchaser.username',
      'purchaser.phone',
      'purchaser.city',
      'purchaser.township',
      'purchaser.address',
      'purchaser.email',
      'purchaser.remark',
      'record.orderlist_id',
      DB::raw("(
        SELECT CONCAT(
          group_concat( 
            CONCAT(service.title,'|',service.special_offer,'|',orderlist.number)
          )
        ) 
        from orderlist
        JOIN service ON FIND_IN_SET(service.id, orderlist.service_id)
        where FIND_IN_SET(orderlist.id,record.orderlist_id) 
      ) as orderlist"),
      // DB::raw("(
      //   SELECT CONCAT(
      //     group_concat( 
      //       CONCAT('id,',service.id,',title,',service.title,',price,',service.special_offer,',number,',orderlist.number)
      //     )
      //   ) 
      //   from orderlist
      //   JOIN service ON FIND_IN_SET(service.id, orderlist.service_id)
      //   where FIND_IN_SET(orderlist.id,record.orderlist_id) 
      // ) as orderlist"),
      // DB::raw("(
      //   SELECT CONCAT('[',
      //     group_concat( 
      //       CONCAT('{id:',service.id,','), 
      //       CONCAT('title:',service.title,','), 
      //       CONCAT('price:',service.special_offer,','), 
      //       CONCAT('number:',orderlist.number,'}')
      //     )
      //   ,']') 
      //   from orderlist
      //   JOIN service ON FIND_IN_SET(service.id, orderlist.service_id)
      //   where FIND_IN_SET(orderlist.id,record.orderlist_id) 
      // ) as orderlist"),
      // orderlist.id in(record.orderlist_id)
      // where FIND_IN_SET(orderlist.id,record.orderlist_id) 
      // service.id, 
      // service.title, 
      // service.special_offer, 
      // orderlist.number
      // CONCAT('"id":"',service.id,'",'), 
      // CONCAT('"title":"',service.title,'",'),
      // CONCAT('"spice":"',service.special_offer,'",'),
      // CONCAT('"number":"',orderlist.number,'"')
      // DB::raw("({$SubQuery->toSql()} ) as orderlist")
      // 'orderlist.id as oid','orderlist.number','orderlist.created_at','orderlist.record_id',
      // 'service.id as sid','service.title','service.price','service.special_offer',
    )
      // ->mergeBindings($subquery)
      ->join('purchaser', 'record.purchaser_id', '=', 'purchaser.id')
      // ->join('orderlist', 'record.orderlist_id', 'in', 'orderlist.id')
      // ->join('orderlist', function($join){
      //   $join->whereRaw("find_in_set(orderlist.id,record.orderlist_id)");
      // })
      // ->whereIn('orderlist.id',['record.orderlist_id'])
      // ->join('service', 'orderlist.service_id', '=', 'service.id')
      // ->join('record', 'record.record_id', '=', 'record.id')
      // ->groupBy('orderlist.record_id')
      // ->selectRaw('user_id, sum(views) as total_views')
      ->offset($result['startValue'])
      ->limit($result['endValue'])
      ->orderBy('record.updated_at', 'DESC')
      ->get();
    // dd($this->result['datas']);

    // $datas = db_or::select(
    //   'orderlist.id as oid','orderlist.number','orderlist.created_at',
    //   'record.id as rid','record.merchant_no','record.trade_no','record.payment_type','record.orderstatus',
    //   'purchaser.id as pid','purchaser.username','purchaser.phone','purchaser.city','purchaser.township','purchaser.address','purchaser.email','purchaser.remark',
    //   'service.id as sid','service.title','service.text','service.price','service.special_offer'
    // )
    // ->join('service', 'orderlist.service_id', '=', 'service.id')
    // ->join('purchaser', 'orderlist.purchaser_id', '=', 'purchaser.id')
    // ->join('record', 'orderlist.record_id', '=', 'record.id')
    // ->offset($result['startValue'])
    // ->limit($result['endValue'])
    // ->orderBy('orderlist.id', 'ASC')
    // ->get();
    // $array = array();
    // foreach ($datas as $i=>$data){
    //   //查找rid,pid 一樣就合併
    //   $rid = array_search($data['rid'], array_column($array, 'rid'));
    //   $pid = array_search($data['pid'], array_column($array, 'pid'));
    //   if($rid===0 && $pid===0 || $rid && $pid && $rid == $pid){
    //     $row = array();
    //     $row['sid'] = $data['sid'];
    //     $row['title'] = $data['title'];
    //     $row['number'] = $data['number'];
    //     $row['special_offer'] = $data['special_offer'];
    //     // print_r( $array[$rid]['orderlist'] );
    //     // print_r( $row );
    //     $array[$rid]['orderlist'][] = $row;
    //     continue;
    //   }
    //   $row = array();
    //   $row['rid'] = $data['rid'];
    //   $row['merchant_no'] = $data['merchant_no'];
    //   $row['trade_no'] = $data['trade_no'];
    //   $row['payment_type'] = $data['payment_type'];
    //   $row['orderstatus'] = $data['orderstatus'];
    //   $row['pid'] = $data['pid'];
    //   $row['username'] = $data['username'];
    //   $row['phone'] = $data['phone'];
    //   $row['city'] = $data['city'];
    //   $row['township'] = $data['township'];
    //   $row['address'] = $data['address'];
    //   $row['email'] = $data['email'];
    //   $row['remark'] = $data['remark'];
    //   $row['oid'] = $data['oid'];
    //   $row['created_at'] = $data['created_at'];
    //   // $row['number'] = $data['number'];
    //   $row['sid'] = $data['sid'];
    //   // $row['title'] = $data['title'];
    //   // $row['price'] = $data['price'];
    //   // $row['special_offer'] = $data['special_offer'];
    //   $row['orderlist'] = [array(
    //     'sid'=>$data['sid'],
    //     'title'=>$data['title'],
    //     'number'=>$data['number'],
    //     'special_offer'=>$data['special_offer'],
    //   )];
    //   array_push($array,$row);
    // }
    // // echo $array[0]['rid'];
    // dd($array);
    // dd($this->result['datas']);
    $this->result['pageStart'] =  $result['pageStart'];
    $this->result['pageTotle'] =  $result['pageTotle'];
    return view($this->result['viewName'], $this->result);
  }
  public function bacar_delete($id, $pageId)
  {
    // $data = nowDB::find($id);
    // //購買人清單
    // $data_purchaser = db_pu::find($data['purchaser_id']);
    // // CustomFn::imgDelet($data,'uploads/activity-record-photo');
    // $data->delete();
    // $data_purchaser->delete();
    // // dd($this->result['viewName'].'/'. $pageId);
    return redirect($this->result['viewName'] . '/' . $pageId);
  }
}
