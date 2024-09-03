<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familytalk extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = 'familytalk';
    // protected $dates = ['delete_at'];
    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'cover',
      'title',
      'content',
      'is_enable',
    ];
}
