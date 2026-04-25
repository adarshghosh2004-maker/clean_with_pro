<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tbl_gallery';

    protected $guarded = array();

    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'before_img' => 'string',
        'after_img' => 'string',
        'status' => 'integer',
    ];

}
