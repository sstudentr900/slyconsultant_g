<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthEducationResources extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = 'health_education_resources';
    // protected $dates = ['delete_at'];
    //主鍵名稱
    protected $promaryKey = 'id';

     //可變動欄位
    protected $fillable = [
      'cover',
      'pdf',
      'content',
      'title',
      'is_enable',
      'classification',
    ];
}
