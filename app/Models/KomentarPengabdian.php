<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomentarPengabdian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'komentar_pengabdian';

    protected $fillable = [
        'pengabdian_id',
        'komentar',
        'nama_lengkap',
        'foto_profile',
    ];

    public function pengabdian()
    {
        return $this->belongsTo(Pengabdian::class);
    }
}
