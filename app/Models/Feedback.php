<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'tbl_feedback';
    protected $guarded = array();

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'mobile_no' => 'string',
        'area_name' => 'string',
        'feedback' => 'string',
        'rating' => 'integer',
        'status' => 'integer',
    ];
}
