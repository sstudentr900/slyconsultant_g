<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  BamanagerController,
  BaqaController,
  BaserviceController,
  BacarController,
  BaController,
  FnController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//預設
// Route::get('/', function () {
//     return view('welcome');
// });

//後台----------------------------------------------------------
Route::get('balogin', [BaController::class, 'balogin_get'])->name('balogin');
Route::post('balogin', [BaController::class, 'balogin_post'])->name('balogin');
Route::group(['middleware' => ['auth.baadmin']], function () {
  //後台管員 首頁
  Route::get('bamanager/{id?}', [BamanagerController::class, 'bamanager_search'])->name('bamanager');
  Route::get('bamanager_add', [BamanagerController::class, 'bamanager_add'])->name('bamanager_add');
  Route::post('bamanager_add', [BamanagerController::class, 'bamanager_addpost'])->name('bamanager_add');
  Route::get('bamanager_update/{id?}/{pageId?}', [BamanagerController::class, 'bamanager_update'])->name('bamanager_add');
  Route::post('bamanager_update/{id?}/{pageId?}', [BamanagerController::class, 'bamanager_updatepost'])->name('bamanager_add');
  Route::get('bamanager_passord/{id?}/{pageId?}/{value?}', [BamanagerController::class, 'bamanager_password'])->name('bamanager_add');
  Route::get('bamanager_delete/{id?}/{pageId?}', [BamanagerController::class, 'bamanager_delete'])->name('bamanager_add');
  //常見問題
  Route::get('baqa/{id?}', [BaqaController::class, 'baqa_search'])->name('baqa');
  Route::get('baqa_add', [BaqaController::class, 'baqa_add'])->name('baqa_add');
  Route::post('baqa_add', [BaqaController::class, 'baqa_addpost'])->name('baqa_add');
  Route::get('baqa_update/{id?}/{pageId?}', [BaqaController::class, 'baqa_update'])->name('baqa_update');
  Route::post('baqa_update/{id?}/{pageId?}', [BaqaController::class, 'baqa_updatepost'])->name('baqa_update');
  Route::get('baqa_delete/{id?}/{pageId?}', [BaqaController::class, 'baqa_delete'])->name('baqa_delete');
  //服務項目
  Route::get('baservice/{id?}', [BaserviceController::class, 'baservice_search'])->name('baservice');
  Route::get('baservice_add', [BaserviceController::class, 'baservice_add'])->name('baservice_add');
  Route::post('baservice_add', [BaserviceController::class, 'baservice_addpost'])->name('baservice_add');
  Route::get('baservice_update/{id?}/{pageId?}', [BaserviceController::class, 'baservice_update'])->name('baservice_update');
  Route::post('baservice_update/{id?}/{pageId?}', [BaserviceController::class, 'baservice_updatepost'])->name('baservice_update');
  Route::get('baservice_delete/{id?}/{pageId?}', [BaserviceController::class, 'baservice_delete'])->name('baservice_delete');
  //購物訂單
  Route::get('bacar/{id?}', [BacarController::class, 'bacar_search'])->name('bacar');
  Route::get('bacar_add', [BacarController::class, 'bacar_add'])->name('bacar_add');
  Route::post('bacar_add', [BacarController::class, 'bacar_addpost'])->name('bacar_add');
  Route::get('bacar_update/{id?}/{pageId?}', [BacarController::class, 'bacar_update'])->name('bacar_update');
  Route::post('bacar_update/{id?}/{pageId?}', [BacarController::class, 'bacar_updatepost'])->name('bacar_update');
  Route::get('bacar_delete/{id?}/{pageId?}', [BacarController::class, 'bacar_delete'])->name('bacar_delete');
  //後台登出
  Route::get('basignout', [BaController::class, 'basignout']);
});

//404----------------------------------------------------------
Route::fallback(function () {
  return redirect()->route('fnindex');
});
//前台---------------------------------------------------------------
Route::get('/', function () {
  return redirect()->route('fnindex');
});
//首頁
Route::get('index', [FnController::class, 'fnindex'])->name('fnindex');
//常見問題
Route::get('qa/{id?}', [FnController::class, 'fnqa'])->name('fnqa');
//欠款資訊
Route::get('pay', [FnController::class, 'fnpay'])->name('fnpay');
//我要諮詢
Route::post('consult', [FnController::class, 'fnconsult'])->name('fnconsult');
//查詢欠款金額
Route::post('search', [FnController::class, 'fnsearch'])->name('fnsearch');
//服務項目
Route::get('service/{id?}', [FnController::class, 'fnservice'])->name('fnservice');
//服務條款
Route::get('terms', [FnController::class, 'fnterms'])->name('fnterms');
//購物車
Route::get('car', [FnController::class, 'fncar'])->name('fncar');
Route::post('car', [FnController::class, 'fncar_post'])->name('fncar_post');
//結帳
Route::get('checkout', [FnController::class, 'fncheckout'])->name('fncheckout');
Route::post('checkout', [FnController::class, 'fncheckout_post'])->name('fncheckout_post');
//付款(真金流)
Route::get('payments/{cost?}/{name?}/{phone?}/{casenumber?}/{city?}/{address?}', [FnController::class, 'fnpayments'])->name('fnpayments');
//假付款(金流)
Route::post('payment', [FnController::class, 'fnpayment'])->name('fnpayment');
//背景支付
Route::post('payment_notify', [FnController::class, 'fnpayment_notify'])->name('fnpayment_notify');
//支付完成
Route::post('payment_return', [FnController::class, 'fnpayment_return'])->name('fnpayment_return');
//完成訂單
Route::get('complete_order', [FnController::class, 'fncomplete_order'])->name('fncomplete_order');
// 取號
// Route::post('payment_customer', [FnController::class, 'fnpayment_customer'])->name('fnpayment_customer');
// Route::get('payment_customer', [FnController::class, 'fnpayment_customer'])->name('fnpayment_customer');
// 返回商店網址
// Route::get('payment_clientback', [FnController::class, 'fnpayment_clientback'])->name('fnpayment_clientback');
// 取得csr
// Route::get('getCsr', [FnController::class, 'getCsr'])->name('getCsr');


// //自定義插建
// Route::get('customplug', [FnController::class, 'customplug'])->name('customplug');
