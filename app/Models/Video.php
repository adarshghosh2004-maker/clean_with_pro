<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'tbl_videos';
    protected $guarded = array();

    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'image' => 'string',
        'video' => 'string',
        'status' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
