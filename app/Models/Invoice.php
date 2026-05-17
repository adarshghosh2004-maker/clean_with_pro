<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'tbl_invoice';
    protected $guarded = array();

    protected $casts = [
        'id' => 'integer',
        'quote_id' => 'integer',
        'invoice_id' => 'string',
        'service_json' => 'string',
        'technician_name' => 'string',
        'total' => 'string',
        'payment_type' => 'integer',
        'time_spend' => 'string',
        'status' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'quote_id'
        );
    }
}
