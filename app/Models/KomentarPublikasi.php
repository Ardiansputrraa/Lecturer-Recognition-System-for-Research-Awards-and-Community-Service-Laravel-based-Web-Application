<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomentarPublikasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'komentar_publikasi';

    protected $fillable = [
        'publikasi_id',
        'komentar',
        'nama_lengkap',
        'foto_profile',
    ];

    public function publikasi()
    {
        return $this->belongsTo(Publikasi::class);
    }
}
