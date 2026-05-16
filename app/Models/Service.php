<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $table = 'tbl_service';
    protected $fillable = ['title', 'description', 'banner_img', 'slug'];

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

    public function user_requests()
    {
        return $this->hasMany(User::class, 'service_id');
    }

    // ✅ Slug auto-generate logic
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
