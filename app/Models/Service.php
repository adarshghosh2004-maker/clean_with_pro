<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'tbl_service';

    protected $guarded = array();

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'short_title' => 'string',
        'description' => 'string',
        'banner_img' => 'string',
        'detail_img1' => 'string',
        'detail_img2' => 'string',
        'status' => 'integer',
    ];

}
