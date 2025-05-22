<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifikasi extends Model
{
    use HasFactory;
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
