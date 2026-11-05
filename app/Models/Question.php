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
        'img_1' => 'string',
        'img_2' => 'string',
        'img_3' => 'string',
        'status' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
