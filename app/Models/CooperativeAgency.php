<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CooperativeAgency extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = 'cooperativeagency';
    // protected $dates = ['delete_at'];
    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'cover',
      'link_name',
      'link',
      'category',
      'releases',
    ];
}
