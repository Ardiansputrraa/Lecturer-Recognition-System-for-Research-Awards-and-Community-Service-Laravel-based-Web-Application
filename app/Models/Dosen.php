<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nip',
        'fakultas',
        'prodi',
        'no_telepon',
        'foto_profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class);
    }

    public function kolaborasiPenelitian()
    {
        return $this->belongsToMany(Penelitian::class, 'kolaborator_penelitian');
    }

    public function publikasi()
    {
        return $this->hasMany(Publikasi::class);
    }

    public function kolaborasiPublikasi()
    {
        return $this->belongsToMany(Publikasi::class, 'kolaborator_publikasi');
    }

    public function pengabdian()
    {
        return $this->hasMany(Pengabdian::class);
    }

    public function kolaborasiPengabdian()
    {
        return $this->belongsToMany(Pengabdian::class, 'kolaborator_pengabdian');
    }

    public function hki()
    {
        return $this->hasMany(Hki::class);
    }

    public function kolaborasiHki()
    {
        return $this->belongsToMany(Hki::class, 'kolaborator_hki');
    }
}
