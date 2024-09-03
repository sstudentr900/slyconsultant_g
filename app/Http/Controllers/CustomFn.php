<?php

namespace App\Http\Controllers;

class CustomFn
{
  //pdf
  static function pdfAdd($fileValue, $customName, $fileSrc=null)
  {
    //$fileValue->getClientOriginalName()原本檔案名稱
    $fileName =  $customName . time() .'.pdf';
    $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
    $path = base_path().'/public/'.$fileSrc.'/'.$fileName; //圖片路徑
    //$fileValue->get() 取得檔案內容
    file_put_contents($path,$fileValue->get()); //返回的是字节数
    return $fileName;
  }
  static function pdfUpdata($fileValue, $dataValue, $fileName, $fileSrc=null)
  {
    // dd($fileValue,$dataValue->pdf);
    if ($fileValue==$dataValue->pdf) {
      //來源檔案==儲存檔案=>不改變
      return '';
    }else{
      //先移除再新增
      self::pdfDelet($dataValue,$fileSrc);
      return self::pdfAdd($fileValue,$fileName,$fileSrc);
    }
  }
  static function pdfDelet($userData, $fileSrc=null)
  {
    if ($userData->pdf) {
      $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
      $path = base_path().'/public/'.$fileSrc.'/'.$userData->pdf; //圖片路徑
      if (file_exists($path) && is_file($path)) {
        unlink($path);
      }
    }
  }
  //file
  static function fileAdd($fileValue, $customName, $fileSrc=null)
  {
    //$fileValue->getClientOriginalName()原本檔案名稱
    // dd($fileValue->getClientOriginalName(),explode('.',$fileValue->getClientOriginalName())[1]);
    $fileName =  $customName . time() .'.'.explode('.',$fileValue->getClientOriginalName())[1];
    $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
    $path = base_path().'/public/'.$fileSrc.'/'.$fileName; //圖片路徑
    //$fileValue->get() 取得檔案內容
    file_put_contents($path,$fileValue->get()); //返回的是字节数
    return $fileName;
  }
  static function fileUpdata($fileValue, $userData, $customName, $fileSrc=null)
  {
    self::fileDelet($userData,$fileSrc);
    return self::fileAdd($fileValue,$customName,$fileSrc);
    //資料庫圖片和上傳圖片名稱不一樣
    // dd($fileValue->extension());
    // if ($userData && $userData != 'error.jpg') {
    //   $path = base_path().'/public/'.$fileSrc.'/'.$userData; //圖片路徑
    //   //$fileValue->get() 取得檔案內容
    //   file_put_contents($path, $fileValue->get()); //返回的是字节数
    //   return '';
    // }else{
    //   return self::pdfAdd($fileValue,$customName,$fileSrc);
    // }
  }
  static function fileDelet($userData, $fileSrc=null)
  {
    if ($userData) {
      $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
      $path = base_path().'/public/'.$fileSrc.'/'.$userData; //圖片路徑
      if (file_exists($path) && is_file($path)) {
        unlink($path);
      }
    }
  }
  //cover 圖片
  static function imgAdd($fileValue, $customName, $fileSrc=null)
  {
    $imgName =  $customName . time() . '.jpg';
    $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
    $path = base_path().'/public/'.$fileSrc.'/'.$imgName; //圖片路徑
    file_put_contents($path, base64_decode(str_replace('data:image/jpeg;base64,', '', $fileValue))); //返回的是字节数
    return $imgName;
  }
  static function imgUpdata($fileValue, $userData, $customName, $fileSrc=null)
  {
    // self::imgDelet($userData,$fileSrc);
    // return self::imgAdd($fileValue,$customName,$fileSrc);

    //有上傳圖片路徑
    // $path = base_path().'/public/'.config('app.imgName').'/'.$userData->cover; 
    $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
    $path = base_path().'/public/'.$fileSrc.'/'.$userData->cover; 
    // dd($fileValue,$path,file_exists($path),is_file($path));
    if (file_exists($path) && is_file($path)) {
      //來源是'data:image/jpeg;base64,'就覆蓋上傳圖片路徑
      // dd($fileValue,strpos($fileValue,'data:image/jpeg;base64,')!== false);
      if(strpos($fileValue,'data:image/jpeg;base64,')!== false){
        file_put_contents($path, base64_decode(str_replace('data:image/jpeg;base64,', '', $fileValue))); //返回的是字节数
      }
      return $userData->cover;
    }else{
      //沒有就新增上傳圖片
      return self::imgAdd($fileValue, $customName, $fileSrc);
    }
  }
  static function imgDelet($userData, $fileSrc=null)
  {
    if ($userData->cover != 'error.jpg') {
      // $imgName = base_path().'/public/'.config('app.imgName').'/'.($userData->cover);
      $fileSrc = $fileSrc?$fileSrc:config('app.imgName');
      $path = base_path().'/public/'.$fileSrc.'/'.$userData->cover; //圖片路徑
      if (file_exists($path) && is_file($path)) {
        unlink($path);
      }
    }
  }
  //errorFn
  static function errorFn($url,$message){
    return redirect($url)
    ->withErrors($message)
    ->withInput();
  }
  //共用查詢
  static function search($count, $end, $pageNow)
  {
    $pageTotle = intval(ceil($count / $end));
    $pageStart = intval($pageNow);
    if ($pageNow > $pageTotle) {
      $pageStart = $pageTotle;
    } else if ($pageNow < 1) {
      $pageStart = 1;
    }
    $start = ($pageStart - 1) * $end;
    return array('pageStart'=>$pageStart,'pageTotle'=>$pageTotle,'startValue'=>$start,'endValue'=>$end);
  }
  //共用附件
  // static function appendix_add($data,$files,$id)
  // {
  //   foreach ($files as $key => $value) {
  //     $uploadedFile = $files[$key];
  //     // $uploadedFile->getMimeType();//取得檔案
  //     $path = $uploadedFile->store('public'); //storage/app/public/自訂亂碼名稱
  //     $filename =  $uploadedFile->getClientOriginalName();
  //     // $data = new data_appendix;
  //     // $data->meeting_id = $id;
  //     $data->news_id = $id;
  //     $data->src = $path;
  //     $data->name = $filename;
  //     $data->save();
  //   }
  // }
  // static function appendix_delet($data,$id)
  // {
  //   // $appendix =  data_appendix::where('id', $id)->first();
  //   $appendix =  $data::where('id', $id)->first();
  //   if ($appendix) {
  //     // print_r($appendix['src']);
  //     unlink(storage_path('app/' . $appendix['src'])); //delet store/app/fileName
  //     // data_appendix::find($id)->delete();  //delet data
  //     $data::find($id)->delete();  //delet data
  //     return 'ok';
  //   }
  // }
}
