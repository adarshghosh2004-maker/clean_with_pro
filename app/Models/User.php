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
        'status' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function novel()
    {
        return $this->hasMany(Novel::class, 'id');
    }
    public function magazine()
    {
        return $this->hasMany(Novel::class, 'id');
    }
    public function audio_book()
    {
        return $this->hasMany(Novel::class, 'id');
    }
    public function content_transaction()
    {
        return $this->hasMany(Content_Transaction::class, 'user_id');
    }
    public function login_history()
    {
        return $this->hasMany(Login_History::class, 'user_id');
    }
    public function audio_books()
    {
        return $this->hasMany(AudioBook::class, 'author_id');
    }
    public function novels()
    {
        return $this->hasMany(Novel::class, 'author_id');
    }
    public function magazines()
    {
        return $this->hasMany(Magazine::class, 'author_id');
    }
    public function content_transactions()
    {
        return $this->hasMany(Content_Transaction::class, 'author_id');
    }
    public function author_payouts()
    {
        return $this->hasMany(Author_Payout::class, 'author_id');
    }
}
