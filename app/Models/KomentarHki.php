<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomentarHki extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'komentar_hki';

    protected $fillable = [
        'hki_id',
        'komentar',
        'nama_lengkap',
        'foto_profile',
    ];

    public function hki()
    {
        return $this->belongsTo(Hki::class);
    }
}
