<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question as db_qu;
use App\Models\Orderlist as db_or;
use App\Models\Purchaser as db_pu;
use App\Models\Record as db_re;
use App\Models\Service as db_se;
// use Illuminate\Support\Str;
use App\Http\Controllers\CustomFn; //自訂函數
use Illuminate\Support\Facades\Mail; //寄信
use Illuminate\Support\Facades\Validator; //驗證資料
// use Datomon\LaravelNewebpay\Library\NewebPay;
class FnController extends Controller
{
  // 首頁---------------------------------------
  public function fnindex($placard = 0)
  {
    $qaList = db_qu::where('release', 'y')->orderBy('sort', 'asc')->limit(6)->get();
    $lists = db_se::where([['delete', 'n'], ['release', 'y']])->limit(6)->orderBy('sort', 'asc')->get();
    // $CourseNewsList = CourseNews::where('is_enable','1')->orderBy('created_at', 'desc')->limit(7)->get();
    // $CarouselList = Carousel::where('release','y')->orderBy('sort', 'asc')->get();
    // $list = SelfHelp::where('releases','y')->orderBy('id', 'asc')->get();
    // $list = $list?$list:false;
    // $NewsList = $NewsList?$NewsList:false;
    // $CourseNewsList = $CourseNewsList?$CourseNewsList:false;
    // $CarouselList = $CarouselList?$CarouselList:false;
    // $list = $list?$list:false;
    return view('fnindex', [
      'active' => 'fnindex',
      'qaList' => $qaList, //qa
      'lists' => $lists, //qa
      // 'CourseNewsList' => $CourseNewsList,
      'placard' => $placard, //公告
    ]);
  }

  //常見問題 FAQs---------------------------------------
  public function fnqa($pageNow = 1)
  {
    $array = [
      'active' => 'fnqa', //class
      'end' => 15, //顯示數量
      'pageNow' => $pageNow, //設定第一頁
    ];
    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    $result = CustomFn::search(db_qu::count(), $array['end'], $array['pageNow']);
    //取得資料
    $array['qaList'] = db_qu::where('release', 'y')->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    $array['pageStart'] =  $result['pageStart'];
    $array['pageTotle'] =  $result['pageTotle'];
    return view('fnqa', $array);
  }

  //查詢欠款金額---------------------------------------
  public function fnsearch(Request $request)
  {
    //接收資料
    $input = request()->all();
    //驗證規則
    $rules = [
      // 'pid' => ['required','size:10'],
      'pid' => [
        'required',
        function ($attribute, $value, $fail) {
          $err = '';
          //先將字母數字存成陣列
          $alphabet = [
            'A' => '10',
            'B' => '11',
            'C' => '12',
            'D' => '13',
            'E' => '14',
            'F' => '15',
            'G' => '16',
            'H' => '17',
            'I' => '34',
            'J' => '18',
            'K' => '19',
            'L' => '20',
            'M' => '21',
            'N' => '22',
            'O' => '35',
            'P' => '23',
            'Q' => '24',
            'R' => '25',
            'S' => '26',
            'T' => '27',
            'U' => '28',
            'V' => '29',
            'W' => '32',
            'X' => '30',
            'Y' => '31',
            'Z' => '33'
          ];
          //檢查字元長度
          if (strlen($value) != 10) { //長度不對
            $err = '1';
          }

          //驗證英文字母正確性
          $alpha = substr($value, 0, 1); //英文字母
          $alpha = strtoupper($alpha); //若輸入英文字母為小寫則轉大寫
          if (!preg_match("/[A-Za-z]/", $alpha)) {
            $err = '2';
          } else {
            //計算字母總和
            $nx = $alphabet[$alpha];
            $ns = $nx[0] + $nx[1] * 9; //十位數+個位數x9
          }

          //驗證男女性別
          $gender = substr($value, 1, 1); //取性別位置
          //驗證性別
          if ($gender != '1' && $gender != '2') {
            $err = '3';
          }

          //N2x8+N3x7+N4x6+N5x5+N6x4+N7x3+N8x2+N9+N10
          if ($err == '') {
            $i = 8;
            $j = 1;
            $ms = 0;
            //先算 N2x8 + N3x7 + N4x6 + N5x5 + N6x4 + N7x3 + N8x2
            while ($i >= 2) {
              $mx = substr($value, $j, 1); //由第j筆每次取一個數字
              $my = $mx * $i; //N*$i
              $ms = $ms + $my; //ms為加總
              $j += 1;
              $i--;
            }
            //最後再加上 N9 及 N10
            $ms = $ms + substr($value, 8, 1) + substr($value, 9, 1);
            //最後驗證除10
            $total = $ns + $ms; //上方的英文數字總和 + N2~N10總和
            if (($total % 10) != 0) {
              $err = '4';
            }
          }
          if ($err) {
            $fail("身分證格式錯誤");
          }
        }
      ],
      'birth' => [
        'required',
        function ($attribute, $value, $fail) {
          // dd((bool)preg_match("/^[0-9]{2,3}\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/",$value));
          if (!preg_match("/^[0-9]{2,3}\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/", $value)) {
            $fail("出生日格式錯誤");
          }
        }
      ],
    ];
    //資料驗證錯誤
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return redirect('index#fnindex_search')->withErrors($validator)->withInput();
    }
    //債務人資訊API POST https://test-km.sly-ha.com.tw/api/getDebtorInfo pid:F231062216,pid:95/03/06
    $url = "https://test-km.sly-ha.com.tw/api/getDebtorInfo";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //不直接輸出以文字返回
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //post 傳遞
    curl_setopt($ch, CURLOPT_POST, true);
    //post 傳值
    //有0移除
    if (substr($input['birth'], 0, 1) === "0") {
      $input['birth'] = substr($input['birth'], 1);
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("pid" => strtoupper($input['pid']), "birth" => $input['birth'])));
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output, true);
    // dd($output);  
    if ($output['result'] == 'failed') {
      return $this->fnindex('找不到資料');
    }
    if ($output['result'] == 'success') {
      //欠款資訊
      return view('fnpay', [
        'active' => 'fnpay',
        'datas' => $output['data']
      ]);
    }
  }

  //聯絡我們--------------------------------------- 
  public function fnconsult(Request $request)
  {
    // $input = $request->validate([
    //   'name' => 'required|max:20',
    //   'email' => 'required|email|max:50',
    //   'tel' => 'required|digits_between:6,20',
    //   'textarea' => 'required',
    // ]);

    //接收資料
    $input = request()->all();
    //驗證規則
    $rules = [
      'name' => ['required', 'max:20'],
      'email' => ['required', 'email', 'max:100'],
      'phone' => ['required', 'digits_between:6,20'],
      'textarea' => ['required'],
      'captcha' => 'required|captcha',
    ];
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      //資料驗證錯誤
      return redirect('index#fnindex_contact')->withErrors($validator)->withInput();
    }

    //寄信
    //dd(132, $input['name'], $input['email'], $input['phone'], $input['textarea']);
    Mail::send(
      'email_consult',
      ['name' => $input['name'], 'email' => $input['email'], 'tel' => $input['phone'], 'textarea' => $input['textarea']],
      function ($mail) use ($input) {
        // $mail->to('sstudentr900@gmail.com');
        // $mail->subject('來自馨琳揚企管顧問-'.$input['name'].'諮詢');
        $mail->from(env('MAIL_FROM_ADDRESS', 'sstudentr800@gmail.com'), '來自馨琳揚企管顧問');
        $mail->to(env('MAIL_FROM_ADDRESS', 'sstudentr800@gmail.com'));
        $mail->subject('來自馨琳揚企管顧問-' . $input['name'] . '諮詢');
      }
    );
    return $this->fnindex('寄信成功');
  }

  //服務項目--------------------------------------- 
  public function fnservice($pageNow = 1)
  {
    $array = [
      'active' => 'fnservice', //class
      'end' => 6, //顯示數量
      'pageNow' => $pageNow, //設定第一頁
    ];
    //取得pageStart,pageTotle;nowDB::count()=>取得資料總數
    $result = CustomFn::search(db_se::count(), $array['end'], $array['pageNow']);
    //取得資料
    $array['lists'] = db_se::where([['delete', 'n'], ['release', 'y']])->offset($result['startValue'])->limit($result['endValue'])->orderBy('sort', 'asc')->get();
    $array['pageStart'] =  $result['pageStart'];
    $array['pageTotle'] =  $result['pageTotle'];
    return view('fnservice', $array);
  }

  //服務條款--------------------------------------- 
  public function fnterms()
  {
    return view('fnterms', [
      'active' => 'fnterms',
    ]);
  }

  //購物車--------------------------------------- 
  public function fncar()
  {
    return view('fncar', [
      'active' => 'fncar'
    ]);
  }
  public function fncar_post()
  {
    $input = request()->all();
    $validator = Validator::make($input, [
      'car' => 'required',
    ]);
    //判斷有無這個key或是空值
    if ($validator->fails() || !array_key_exists('car', $input) || empty($input['car'])) {
      //資料驗證錯誤
      return response()->json(['status' => false, 'message' => '錯誤，請重新操作'], 400);
    }
    //查找資料
    // dd($input['car']);
    $array = [];
    foreach ($input['car'] as $value) {
      $row = [];
      $data = db_se::select('id', 'title', 'cover', 'price', 'special_offer')->where(['id' => $value[0], 'release' => 'y'])->first();
      // dd();
      if (null == $data) {
        continue;
      }
      $row['id'] = $data['id'];
      $row['title'] = $data['title'];
      $row['cover'] = $data['cover'];
      $row['price'] = $data['price'];
      $row['special_offer'] = $data['special_offer'];
      $row['number'] = $value[1];
      array_push($array, $row);
    }
    //沒有值
    if (empty($array)) {
      return response()->json(['status' => false, 'message' => '錯誤，找不到資料請重新操作'], 400);
    }
    return response()->json(['status' => true, 'data' => $array], 200);
  }

  //結帳--------------------------------------- 
  public function fncheckout()
  {
    return view('fncheckout', [
      'active' => 'fncheckout'
    ]);
  }
  public function fncheckout_post()
  {
    $input = request()->all();
    $validator = Validator::make($input, [
      'car' => 'required',
    ]);
    if ($validator->fails() || !array_key_exists('car', $input) || empty($input['car'])) {
      //資料驗證錯誤到首頁
      return response()->json(['status' => false, 'message' => '錯誤，請重新操作'], 400);
    }
    foreach ($input['car'] as list($id, $number)) {
      $id = (int)$id;
      $number = (int)$number;
      //資料驗證是0
      if (!$id || !$number) {
        return response()->json(['status' => false, 'message' => '錯誤，請重新操作'], 400);
      }
    }
    //查找資料
    // dd($input['car']);
    $array = [];
    $nowPrice = 0; //小計
    $totlePrice = 0; //總價
    $freightPrice = 0; //運費
    foreach ($input['car'] as list($id, $number)) {
      // dd($id,$number);
      $row = [];
      $data = db_se::select('id', 'title', 'price', 'special_offer')->where(['id' => $id, 'release' => 'y'])->first();
      $row['id'] = $data['id'];
      $row['title'] = $data['title'];
      $row['cover'] = $data['cover'];
      $row['price'] = $data['price'];
      $row['special_offer'] = $data['special_offer'];
      $row['number'] = $number;
      array_push($array, $row);
      $nowPrice = $row['special_offer'] * $number + $nowPrice;
    }
    //沒有值
    if (empty($array)) {
      return response()->json(['status' => false, 'message' => '錯誤，找不到資料請重新操作'], 400);
    }
    //totlePrice
    $totlePrice = $nowPrice + $freightPrice;
    // dd($nowPrice,$freightPrice,$totlePrice);
    return response()->json([
      'status' => true,
      'data' => $array,
      'nowPrice' => $nowPrice,
      'freightPrice' => $freightPrice,
      'totlePrice' => $totlePrice
    ], 200);
  }

  //真付款--------------------------------------- 
  public function fnpayments($cost, $name, $phone, $casenumber, $city = '', $address = '')
  {
    // dd($cost,$name,$phone,$city,$address);
    //檢查資料
    if (!$cost && !$name && !$phone && !$casenumber || $city && !$address || !$city && $address) {
      return $this->fnindex('操作錯誤請重新操作');
    }
    //判斷地址 計算價格
    $remark = '';
    if ($city && $address) {
      //加購清償證明 +100
      $cost = $cost + 100;
      $remark = '加購清償證明 100元';
      $address = $city . $address;
    }

    // dd($casenumber);
    //總金額
    $totle = $cost;

    //購買項目 商品名
    $ItemDesc = '債務諮商';

    //儲存購買人
    // dd($casenumber);
    $pu_id = db_pu::create([
      'casenumber' => $casenumber, //案號	
      'username' => $name, //姓名	
      'phone' => $phone, //連絡電話	
      // 'city' => $city?$city:'',//縣市
      'address' => $address ? $address : '', //街道地址
      // 'township' => $input['township'],//鄉鎮市區
      // 'email' => $input['email'],//電子郵件
      'remark' => $remark ? $remark : '', //訂單備註
    ])->id;

    //儲存藍星
    $this->newebpays($ItemDesc, $totle, $pu_id, $remark);
  }
  //真儲存藍星--------------------------------------- 
  public function newebpays($ItemDesc, $totle, $pu_id, $remark)
  {
    $MerchantID = config('newebpay.MerchantId');
    $mer_key = config('newebpay.Key');
    $mer_iv = config('newebpay.IV');
    $NotifyURL = config('newebpay.NotifyURL');
    $ReturnURL = config('newebpay.ReturnURL');
    $Action = config('newebpay.Active');
    $merchant_no = date("Ymd") . $pu_id; //訂單編號
    $date_now = time(); //目前時間

    $data1 = http_build_query(array(
      'MerchantID' => $MerchantID,
      'TimeStamp' => $date_now,
      'Version' => '2.0',
      'RespondType' => 'String', //回傳格式
      'MerchantOrderNo' => $merchant_no,
      'Amt' => $totle, //價錢
      'ItemDesc' => $ItemDesc, //購買項目
      'NotifyURL' => $NotifyURL, //背景支付
      'ReturnURL' => $ReturnURL, //支付完成
      'OrderComment' => $remark, //備註
      // 'Email'=>$input['email'],
      // 'CustomerURL'=>'https://7d16-211-20-170-212.ngrok-free.app/slyconsultant/public/payment_customer', //取號資訊導回商店設定
      // 'ClientBackURL'=>'https://7d16-211-20-170-212.ngrok-free.app/slyconsultant/public/payment_clientback', //返回商店網址
    ));

    //加密
    $TradeInfo = trim(bin2hex(openssl_encrypt($data1, 'AES-256-CBC', $mer_key, OPENSSL_RAW_DATA, $mer_iv)));
    $hashs = "HashKey=" . $mer_key . "&" . $TradeInfo . "&HashIV=" . $mer_iv;
    $TradeSha = strtoupper(hash("sha256", $hashs));

    //儲存訂單(金流)
    // dd($input['payment']);
    db_re::create([
      'orderlist_id' => 1, //訂單ids
      'purchaser_id' => $pu_id, //	購買人	
      'merchant_no' => $merchant_no, //訂單編號	
      'totle' => $totle, //總金額
    ])->id;


    //post 到藍星
    // <input type='hidden' id='Email' name='Email' value=".$input['email'].">
    echo "<body style='display:none'>
      <form method='post' action=" . $Action . "> 
        <input type='hidden' id='MerchantID' name='MerchantID' value=" . $MerchantID . ">
        <input type='hidden' id='TradeInfo' name='TradeInfo' value=" . $TradeInfo . ">
        <input type='hidden' id='TradeSha' name='TradeSha' value=" . $TradeSha . ">
        <input type='hidden' id='RespondType' name='RespondType' value='JSON'>
        <input type='hidden' id='TimeStamp' name='TimeStamp' value=" . $date_now . ">
        <input type='hidden' id='Version' name='Version' value='2.0'>
        <input type='hidden' id='MerchantOrderNo' name='MerchantOrderNo' value=" . $merchant_no . ">
        <input type='hidden' id='totle' name='Amt' value=" . $totle . ">
        <input type='hidden' id='ItemDesc' name='ItemDesc' value=" . $ItemDesc . ">
        <input type='hidden' id='OrderComment' name='OrderComment' value=" . $remark . ">
        <input type='submit' value='submit'>
      </form>
      <script>
        window.onload=function(){
          localStorage.removeItem('car');
          document.forms[0].submit()
        };
      </script>
    </body>";
  }
  //藍星背景支付
  public function fnpayment_notify(Request $request)
  {
    //只接受 80 與 443 Port

    //解編碼
    $paramsArray = $this->newebpay_decrypt($request['TradeInfo']);

    //存金流訂單
    $data_re = db_re::select('id')->where(['merchant_no' => $paramsArray['MerchantOrderNo']])->first();
    $data_re->trade_no = $paramsArray['TradeNo']; //金流編號
    $data_re->state = $paramsArray['Message']; //狀態
    $data_re->payment_type = $this->newebpay_paymentType($paramsArray['PaymentType']); //交易方式

    // //訂單狀態-信用卡/WebATM
    // if(
    //   $paramsArray['PaymentType']=='CREDIT' || 
    //   $paramsArray['PaymentType']=='WEBATM' 
    // ){
    //   if($paramsArray['Status']='SUCCESS'){
    //     $data_re->orderstatus = 1;
    //   }
    //   else{
    //     $data_re->orderstatus = 0;
    //   }
    // }

    // //訂單狀態-ATM轉帳/條碼繳費/超商代碼繳費  
    // if(
    //   $paramsArray['PaymentType']=='VACC' || 
    //   $paramsArray['PaymentType']=='BARCODE' || 
    //   $paramsArray['PaymentType']=='CVS' 
    // ){
    //   //訂單狀態-超商
    //   // 0＝未付款
    //   // 1＝已付款
    //   // 2＝訂單失敗
    //   // 3＝訂單取消
    //   // 6＝已退款
    //   // 9＝付款中，待銀行確認
    //   // 2.串接程式版本需為1.3版（以上）才會回傳此欄位
    //   $data_re->orderstatus = $paramsArray['OrderStatus'];
    // }

    // //判斷訂單狀態
    if ($paramsArray['Status'] = 'SUCCESS') {
      //回傳繳款狀態
      $re = db_re::select('totle', 'purchaser_id')->where(['merchant_no' => $paramsArray['MerchantOrderNo']])->first();
      // dd('re',$re['purchaser_id'],$re['totle']);
      $pu = db_pu::select('casenumber', 'address')->where(['id' => $re['purchaser_id']])->first();
      // dd('pu',$pu['casenumber'],$pu['address']);
      $data = [];
      $data['pay'] = $re['totle'];
      $pu['address'] ? $data['address'] = $pu['address'] : '';
      // dd('data',$data);
      $url = "https://test-km.sly-ha.com.tw/api/setPaymentStatus/" . $pu['casenumber'];
      // dd('url',$url);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      //不直接輸出以文字返回
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //post 傳遞
      curl_setopt($ch, CURLOPT_POST, true);
      //post 傳值
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      $output = curl_exec($ch);
      curl_close($ch);
      $output = json_decode($output, true);
      // dd($output);  
      if ($output['result'] == 'failed') {
        $data_re->rtnnsg = '回傳繳款狀態失敗';
      }
      if ($output['result'] == 'success') {
        //成功
        $data_re->rtnnsg = '回傳繳款狀態成功';
      }
    }

    //存金流訂單
    $data_re->save();
  }
  //藍星支付回傳
  public function fnpayment_return(Request $request)
  {
    //test
    // dd('fnpayment_return',$request);

    //跳頁
    if (!$request || $request['Status'] != 'SUCCESS') {
      //失敗
      return $this->fnindex('錯誤請重新操作');
    } else {
      //成功
      return redirect()->route('fncomplete_order');
    }



    // //解編碼
    // $paramsArray = $this->newebpay_decrypt($request['TradeInfo']);

    // //存金流訂單
    // $data_re = db_re::select('id')->where(['merchant_no'=>$paramsArray['MerchantOrderNo']])->first();
    // $data_re->trade_no = $paramsArray['TradeNo']; //金流編號
    // $data_re->state = $paramsArray['Message']; //狀態
    // $data_re->payment_type = $this->newebpay_paymentType($paramsArray['PaymentType']); //交易方式

    // //訂單狀態-信用卡/WebATM
    // if(
    //   $paramsArray['PaymentType']=='CREDIT' || 
    //   $paramsArray['PaymentType']=='WEBATM' 
    // ){
    //   if($paramsArray['Status']='SUCCESS'){
    //     $data_re->orderstatus = 1;
    //   }
    //   else{
    //     $data_re->orderstatus = 0;
    //   }
    // }

    // //訂單狀態-ATM轉帳/條碼繳費/超商代碼繳費  
    // if(
    //   $paramsArray['PaymentType']=='VACC' || 
    //   $paramsArray['PaymentType']=='BARCODE' || 
    //   $paramsArray['PaymentType']=='CVS' 
    // ){
    //   //訂單狀態-超商
    //   // 0＝未付款
    //   // 1＝已付款
    //   // 2＝訂單失敗
    //   // 3＝訂單取消
    //   // 6＝已退款
    //   // 9＝付款中，待銀行確認
    //   // 2.串接程式版本需為1.3版（以上）才會回傳此欄位
    //   $data_re->orderstatus = $paramsArray['OrderStatus'];
    // }

    // //判斷訂單狀態
    // if($data_re->orderstatus == 1){
    //   //回傳繳款狀態
    //   // $re = db_re::select('totle','purchaser_id')->where(['merchant_no'=>$paramsArray['MerchantOrderNo']])->first();
    //   // // dd('re',$re['purchaser_id'],$re['totle']);
    //   // $pu = db_pu::select('casenumber','address')->where([ 'id'=> $re['purchaser_id'] ])->first();
    //   // // dd('pu',$pu['casenumber'],$pu['address']);
    //   // $data = [];
    //   // $data['pay'] = $re['totle'];
    //   // $pu['address']?$data['address'] = $pu['address']:'';
    //   // // dd('data',$data);
    //   // $url = "https://test-km.sly-ha.com.tw/api/setPaymentStatus/".$pu['casenumber'];
    //   // // dd('url',$url);
    //   // $ch = curl_init();
    //   // curl_setopt($ch, CURLOPT_URL, $url);
    //   // //不直接輸出以文字返回
    //   // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //   // //post 傳遞
    //   // curl_setopt($ch, CURLOPT_POST, true);
    //   // //post 傳值
    //   // curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) ); 
    //   // $output = curl_exec($ch); 
    //   // curl_close($ch);
    //   // $output = json_decode($output,true);
    //   // // dd($output);  
    //   // if($output['result']=='failed'){
    //   //   $data_re->rtnnsg = '回傳繳款狀態失敗';
    //   // }
    //   // if($output['result']=='success'){
    //   //   //成功
    //   //   $data_re->rtnnsg = '回傳繳款狀態成功';
    //   // }
    // }

    // //存金流訂單
    // $data_re->save();



    // if( !$request || !$request['Status'] || !$request['MerchantID'] || !$request['TradeInfo']){
    //   return $this->fnindex('驗證錯請重新操作');
    //   // dd('payment_return_error,錯誤請重新操作');
    // }

    // //解編碼
    // $paramsArray = $this->newebpay_decrypt($request['TradeInfo']);
    // print_r($paramsArray);

    // //存金流訂單
    // $data_re = db_re::select('id')->where(['merchant_no'=>$paramsArray['MerchantOrderNo']])->first();
    // if(!$data_re){
    //   return $this->fnindex('驗證錯請重新操作');
    //   // dd('payment_return_error,驗證錯');
    // }
    // $data_re->trade_no = $paramsArray['TradeNo']; //金流編號
    // $data_re->state = $paramsArray['Message']; //狀態
    // $data_re->payment_type = $this->newebpay_paymentType($paramsArray['PaymentType']); //交易方式
    // // $paramsArray['IP'];
    // // $paramsArray['EscrowBank']; //款項保管銀行
    // // $paramsArray['RespondCode']; //金融機構回應碼.由收單機構所回應的回應碼
    // // $paramsArray['AuthBank']; //收單金融機構
    // // $paramsArray['Auth']; //由收單機構所回應的授權碼
    // // $paramsArray['Card6No']; //信用卡卡號前六碼
    // // $paramsArray['Card4No']; //信用卡卡號後四碼
    // // $paramsArray['Exp']; //保管銀行
    // // $paramsArray['TokenUseStatus']; //信用卡快速結帳
    // // $paramsArray['InstFirst']; //信用卡分期交易首期金額
    // // $paramsArray['InstEach']; //信用卡分期交易每期金額
    // // $paramsArray['Inst']; //信用卡分期交易期
    // // $paramsArray['ECI']; //3D 回傳值
    // // $paramsArray['PaymentMethod']; //交易類別
    // $data_re->save();

    // //跳頁
    // if($paramsArray['Status']!='SUCCESS'){
    //   //失敗
    //   return $this->fnindex('錯誤請重新操作');
    // }else{
    //   //成功
    //   return redirect()->route('fncomplete_order');
    // }
  }
  //假付款--------------------------------------- 
  public function fnpayment(Request $request)
  {
    //1.檢查資料
    // $input = request()->all();
    // $validator = Validator::make($input, [
    //   'item' =>'required',
    //   'username' =>['required','max:2'],
    //   'phone' =>['required','max:15'],
    //   'city' =>['required','max:50'],
    //   'township' =>['required','max:50'],
    //   'address' =>['required','max:100'],
    //   'email' =>['required','max:100','email'],
    //   'remark' =>'max:20'
    // ]);
    // if($validator->fails()||!array_key_exists('item',$input) || empty($input['item'])){
    //   //資料驗證錯誤
    //   return redirect()->route('fncheckout')->withErrors($validator)->withInput();
    // }

    //2.檢查資料
    $input = $request->validate([
      'item' => 'required',
      'username' => 'required|max:50',
      'phone' => 'required|max:15',
      'city' => 'required|max:50',
      'township' => 'required|max:50',
      'address' => 'required|max:100',
      'email' => 'required|max:100|email',
      'remark' => 'max:20',
      // 'payment' =>'required',
    ]);
    if (!array_key_exists('item', $input) || empty($input['item']) || !is_array($input['item']) || !count($input['item'])) {
      //資料驗證錯誤
      return $this->fnindex('找不到資料');
    }
    foreach ($input['item'] as  $id => $number) {
      $id = (int)$id;
      $number = (int)$number;
      //資料驗證是0
      if (!$id || !$number) {
        return $this->fnindex('資料錯誤');
        break;
      }
      //查得到值
      $data_se = db_se::select('title', 'special_offer')->where(['id' => $id, 'release' => 'y'])->first();
      if (!$data_se) {
        return $this->fnindex('資料錯誤');
        break;
      }
    }


    //計算訂單
    $totle = 0; //總金額
    $or_ids = []; //訂單ids
    $ItemDesc = []; //訂單標題
    foreach ($input['item'] as $id => $number) {
      //組訂單標題
      $data_se = db_se::select('title', 'special_offer')->where(['id' => $id, 'release' => 'y'])->first();
      $totle = ($data_se['special_offer'] * $number) + $totle;
      // dd($totle);
      array_push($ItemDesc, $data_se['title'] . '*' . $number);
      //存購買商品
      $or_id = db_or::create([
        'service_id' => $id, //
        // 'purchaser_id' => $pu_id,//
        // 'record_id' => $re_id,//
        'number' => $number, //
      ])->id;
      array_push($or_ids, $or_id);
    }
    $ItemDesc = implode('<br>', $ItemDesc);


    //儲存購買人
    $pu_id = db_pu::create([
      'username' => $input['username'], //姓名	
      'phone' => $input['phone'], //連絡電話	
      'city' => $input['city'], //縣市
      'township' => $input['township'], //鄉鎮市區
      'address' => $input['address'], //街道地址
      'email' => $input['email'], //電子郵件
      'remark' => $input['remark'], //訂單備註
    ])->id;

    //儲存藍星
    $this->newebpay($ItemDesc, $totle, $or_ids, $pu_id, $input['remark']);
    // return redirect()->route('fncomplete_order');
  }
  //假儲存藍星--------------------------------------- 
  public function newebpay($ItemDesc, $totle, $or_ids, $pu_id, $remark)
  {
    $MerchantID = config('newebpay.MerchantId');
    $mer_key = config('newebpay.Key');
    $mer_iv = config('newebpay.IV');
    $NotifyURL = config('newebpay.NotifyURL');
    $ReturnURL = config('newebpay.ReturnURL');
    $Action = config('newebpay.Active');
    $merchant_no = date("Ymd") . $pu_id; //訂單編號
    $date_now = time(); //目前時間

    $data1 = http_build_query(array(
      'MerchantID' => $MerchantID,
      'TimeStamp' => $date_now,
      'Version' => '2.0',
      'RespondType' => 'String', //回傳格式
      'MerchantOrderNo' => $merchant_no,
      'Amt' => $totle, //價錢
      'ItemDesc' => $ItemDesc, //購買項目
      'OrderComment' => $remark, //備註
      'NotifyURL' => $NotifyURL, //背景支付
      'ReturnURL' => $ReturnURL, //支付完成
      // 'Email'=>$input['email'],
      // 'CustomerURL'=>'https://7d16-211-20-170-212.ngrok-free.app/slyconsultant/public/payment_customer', //取號資訊導回商店設定
      // 'ClientBackURL'=>'https://7d16-211-20-170-212.ngrok-free.app/slyconsultant/public/payment_clientback', //返回商店網址
    ));

    //加密
    $TradeInfo = trim(bin2hex(openssl_encrypt($data1, 'AES-256-CBC', $mer_key, OPENSSL_RAW_DATA, $mer_iv)));
    $hashs = "HashKey=" . $mer_key . "&" . $TradeInfo . "&HashIV=" . $mer_iv;
    $TradeSha = strtoupper(hash("sha256", $hashs));

    //儲存訂單(金流)
    // dd($input['payment']);
    db_re::create([
      'orderlist_id' => implode(',', $or_ids), //訂單ids
      'purchaser_id' => $pu_id, //	購買人	
      'merchant_no' => $merchant_no, //訂單編號	
      'totle' => $totle, //總金額
    ])->id;


    //post 到藍星
    // <input type='hidden' id='Email' name='Email' value=".$input['email'].">
    echo "<body style='display:none'>
        <form method='post' action=" . $Action . "> 
          <input type='hidden' id='MerchantID' name='MerchantID' value=" . $MerchantID . ">
          <input type='hidden' id='TradeInfo' name='TradeInfo' value=" . $TradeInfo . ">
          <input type='hidden' id='TradeSha' name='TradeSha' value=" . $TradeSha . ">
          <input type='hidden' id='RespondType' name='RespondType' value='JSON'>
          <input type='hidden' id='TimeStamp' name='TimeStamp' value=" . $date_now . ">
          <input type='hidden' id='Version' name='Version' value='2.0'>
          <input type='hidden' id='MerchantOrderNo' name='MerchantOrderNo' value=" . $merchant_no . ">
          <input type='hidden' id='totle' name='Amt' value=" . $totle . ">
          <input type='hidden' id='ItemDesc' name='ItemDesc' value=" . $ItemDesc . ">
          <input type='hidden' id='OrderComment' name='OrderComment' value=" . $remark . ">
          <input type='submit' value='submit'>
        </form>
        <script>
          window.onload=function(){
            localStorage.removeItem('car');
            document.forms[0].submit()
          };
        </script>
      </body>";
  }
  //假藍星背景支付
  public function fnpayment_notifyX(Request $request)
  {
    //只接受 80 與 443 Port
    //解編碼
    $paramsArray = $this->newebpay_decrypt($request['TradeInfo']);
    //存金流訂單
    $data_re = db_re::select('id')->where(['merchant_no' => $paramsArray['MerchantOrderNo']])->first();
    $data_re->trade_no = $paramsArray['TradeNo']; //金流編號
    $data_re->state = $paramsArray['Message']; //狀態
    $data_re->payment_type = $this->newebpay_paymentType($paramsArray['PaymentType']); //交易方式
    $data_re->save();
  }
  //假藍星支付回傳
  public function fnpayment_returnX(Request $request)
  {
    //test
    // dd('fnpayment_return',$request);

    //跳頁
    if (!$request || $request['Status'] != 'SUCCESS') {
      //失敗
      return $this->fnindex('錯誤請重新操作');
    } else {
      //成功
      return redirect()->route('fncomplete_order');
    }


    // if( !$request || !$request['Status'] || !$request['MerchantID'] || !$request['TradeInfo']){
    //   return $this->fnindex('驗證錯請重新操作');
    //   // dd('payment_return_error,錯誤請重新操作');
    // }

    // //解編碼
    // $paramsArray = $this->newebpay_decrypt($request['TradeInfo']);
    // print_r($paramsArray);

    // //存金流訂單
    // $data_re = db_re::select('id')->where(['merchant_no'=>$paramsArray['MerchantOrderNo']])->first();
    // if(!$data_re){
    //   return $this->fnindex('驗證錯請重新操作');
    //   // dd('payment_return_error,驗證錯');
    // }
    // $data_re->trade_no = $paramsArray['TradeNo']; //金流編號
    // $data_re->state = $paramsArray['Message']; //狀態
    // $data_re->payment_type = $this->newebpay_paymentType($paramsArray['PaymentType']); //交易方式
    // // $paramsArray['IP'];
    // // $paramsArray['EscrowBank']; //款項保管銀行
    // // $paramsArray['RespondCode']; //金融機構回應碼.由收單機構所回應的回應碼
    // // $paramsArray['AuthBank']; //收單金融機構
    // // $paramsArray['Auth']; //由收單機構所回應的授權碼
    // // $paramsArray['Card6No']; //信用卡卡號前六碼
    // // $paramsArray['Card4No']; //信用卡卡號後四碼
    // // $paramsArray['Exp']; //保管銀行
    // // $paramsArray['TokenUseStatus']; //信用卡快速結帳
    // // $paramsArray['InstFirst']; //信用卡分期交易首期金額
    // // $paramsArray['InstEach']; //信用卡分期交易每期金額
    // // $paramsArray['Inst']; //信用卡分期交易期
    // // $paramsArray['ECI']; //3D 回傳值
    // // $paramsArray['PaymentMethod']; //交易類別
    // $data_re->save();

    // //跳頁
    // if($paramsArray['Status']!='SUCCESS'){
    //   //失敗
    //   return $this->fnindex('錯誤請重新操作');
    // }else{
    //   //成功
    //   return redirect()->route('fncomplete_order');
    // }
  }
  //藍星交易方式
  function newebpay_paymentType($PaymentType)
  {
    switch ($PaymentType) {
      case 'CREDIT':
        return '信用卡一次付清';
      case 'WEBATM':
        return 'Web ATM';
      case 'VACC':
        return 'ATM轉帳';
      case 'BARCODE':
        return '條碼繳費';
      case 'CVS':
        return '超商代碼繳費';
      default:
        return $PaymentType;
    }
  }
  //藍星解密 
  public function newebpay_decrypt($string)
  {
    $mer_key = config('newebpay.Key');
    $mer_iv = config('newebpay.IV');
    $string = openssl_decrypt(hex2bin($string), "AES-256-CBC", $mer_key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $mer_iv);
    $slast = ord(substr($string, -1));
    $slastc = chr($slast);
    $pcheck = substr($string, -$slast);
    if (preg_match("/$slastc{" . $slast . "}/", $string)) {
      $string = substr($string, 0, strlen($string) - $slast);
      //字串轉array
      parse_str($string, $paramsArray);
      return $paramsArray;
    } else {
      return false;
    }
  }

  //完成訂單--------------------------------------- 
  public function fncomplete_order()
  {
    return view('fncomplete_order', [
      'active' => 'fncomplete_order',
    ]);
  }
  // //藍星加密 
  // function newebpay_encryption(){}
  // //藍星取號完成,適用交易類別：超商代碼、超商條碼、超商取貨付款、 ATM
  // public function fnpayment_customer(Request $request) {
  //   //test
  //   // dd('fnpayment_return',$request);

  //   //解編碼
  //   $paramsArray = $this->newebpay_decrypt($request['TradeInfo']);
  //   $paramsArray['ExpireDate'] = $paramsArray['ExpireDate'].' '.$paramsArray['ExpireTime'];
  //   // $paramsArray['ExpireDate'];//繳費截止日期 "2023-10-02"
  //   // $paramsArray['ExpireTime'];//繳費截止日期 "23:59:59"
  //   dd('paramsArray',$paramsArray);
  //   //存金流訂單
  //   $data_re = db_re::select('id')->where(['merchant_no'=>$paramsArray['MerchantOrderNo']])->first();
  //   $data_re->trade_no = $paramsArray['TradeNo']; //金流編號
  //   $data_re->state = $paramsArray['Message']; //狀態
  //   $data_re->merchantorderno = $paramsArray['MerchantOrderNo']; //商店訂單編號
  //   $data_re->expiredate = $paramsArray['ExpireDate']; //轉帳帳號,繳費代碼,ATM,超商代碼回傳參數
  //   //ATM轉帳
  //   if($paramsArray['PaymentType']=="VACC"){
  //     $paramsArray['BankCode'] = $this->newebpay_bankcode($paramsArray['BankCode']);
  //     $data_re->bankcode = $paramsArray['BankCode']; //銀行代碼
  //     $data_re->codeno = $paramsArray['CodeNo']; //轉帳帳號,繳費代碼,ATM,超商代碼回傳參數
  //   }
  //   //超商條碼繳費
  //   if($paramsArray['PaymentType']=="BARCODE"){
  //     // $data_re->Barcode_1 = $paramsArray['BankCode']; //銀行代碼
  //     // $data_re->Barcode_2 = $paramsArray['CodeNo']; //轉帳帳號,繳費代碼,ATM,超商代碼回傳參數
  //     // $data_re->Barcode_3 = $paramsArray['CodeNo']; //轉帳帳號,繳費代碼,ATM,超商代碼回傳參數
  //   }
  //   $paramsArray['PaymentType'] = $this->newebpay_paymentType($paramsArray['PaymentType']);
  //   $data_re->payment_type = $paramsArray['PaymentType']; //交易方式
  //   $data_re->save();

  //   return view('fnpayment_customer', [
  //     'active'=> 'fnpayment_customer',
  //     'params'=> $paramsArray
  //   ]);

  // }
  // //藍星錯誤
  // function newebpay_error($error){
  //   switch($error['Status']){
  //     case 'MPG03009':
  //       return '交易失敗';
  //       break;
  //     case 'label2':
  //       break;
  //     default:
  //       return '沒有該交易方式';
  //   }
  // }
  // //藍星銀行代碼
  // function newebpay_bankcode($PaymentType){
  //   switch($PaymentType){
  //     case '008':
  //       return '008 (華南銀行)';
  //     case '004':
  //       return '004 (台灣銀行)';
  //     default:
  //       return $PaymentType;
  //   }
  // }
  // //csr
  // public function getCsr() {
  //   return csrf_token();
  // }


  //衛教資源
  // public $fnhealthlisttBreadcrumbs =[
  //   [
  //     'name'=>'首頁',
  //     'href'=>'fnhome',
  //   ],
  //   [
  //     'name'=>'成長園地',
  //     'href'=>'',
  //   ],
  //   [
  //     'name'=> '衛教資源',   
  //     'href'=>'fnhealthlist',
  //     'id'=>0
  //   ]
  // ];
  // public function fnhealthcontent(Request $request)
  // {
  //   $Data = HealthEducationResources::find($request->route('id'));
  //   // 取得上一筆資料
  //   $Previou = false;
  //   $Previou = HealthEducationResources::where('id', '<', $request->route('id'))->orderBy('id', 'desc')->limit(1)->first();
  //   // 取得下一筆資料
  //   $Next = false;
  //   $Next = HealthEducationResources::where('id', '>', $request->route('id'))->orderBy('id', 'asc')->limit(1)->first();
  //   return view('fnactivitycontent', [
  //     'datas' => $Data,
  //     // 'appendixs' => $appendixs,
  //     'Previou' => $Previou,
  //     'Next' => $Next,
  //     'href'=>'uploads/health-education-resources/',
  //     'prePageName'=>'fnhealth',
  //     'nextPageName'=>'fnhealthcontent',
  //     'breadcrumbs'=>$this->fnhealthlisttBreadcrumbs
  //   ]);
  // }

  // //自定義插建----------------------------------------------------------------
  // public function customplug() {
  //   return view('customplug');
  // }
}
