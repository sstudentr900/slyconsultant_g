<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityRecord extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = 'activity_record';
    // protected $dates = ['delete_at'];
    //主鍵名稱
    protected $promaryKey = 'id';

     //可變動欄位
    protected $fillable = [
      'cover',
      'content',
      'title',
      'is_enable',
    ];
}
