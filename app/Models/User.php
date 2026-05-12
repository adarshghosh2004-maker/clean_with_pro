<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_user';
    protected $guarded = array();

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'suburb' => 'string',
        'date' => 'string',
        'time' => 'string',
        'service_id' => 'integer',
        'msg' => 'string',
        'reply' => 'string',
        'amount' => 'integer',
        'status' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
