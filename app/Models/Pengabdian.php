<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    protected $table = 'pengabdian';

    protected $fillable = [
        'dosen_id',
        'nama_dosen',
        'jabatan',
        'tahun',
        'besaran_dana',
        'sumber_dana',
        'status',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function filePengabdian()
    {
        return $this->hasMany(FilePengabdian::class);
    }

    public function komentarPengabdian()
    {
        return $this->hasMany(KomentarPengabdian::class);
    }

    public function kolaboratorPengabdian()
    {
        return $this->belongsToMany(Dosen::class, 'kolaborator_pengabdian');
    }
}
