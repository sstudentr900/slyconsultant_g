<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityRecordPhoto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'activity_record_photo';
    protected $dates = ['delete_at'];
}
