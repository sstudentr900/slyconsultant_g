<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    protected $table = 'record';
    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'merchant_no',
      'trade_no',
      'payment_type',
      'state',
      'orderstatus',
      'rtnnsg',
      'orderlist_id',
      'purchaser_id',
      'totle',
    ];
}
