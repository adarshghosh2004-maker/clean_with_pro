<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'tbl_question';
    protected $guarded = array();

    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'description' => 'string',
        'img_1' => 'integer',
        'img_2' => 'integer',
        'img_3' => 'integer',
        'status' => 'integer',
    ];
}
