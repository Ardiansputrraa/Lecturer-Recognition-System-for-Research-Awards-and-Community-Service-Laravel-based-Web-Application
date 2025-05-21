<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama_pengirim',
        'profile_pengirim',
        'komentar',
        'status',
        'url',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
