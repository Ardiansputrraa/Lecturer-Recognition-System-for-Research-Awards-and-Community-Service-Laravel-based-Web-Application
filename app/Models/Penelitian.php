<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penelitian extends Model
{
    use HasFactory;
    protected $table = 'penelitian';

    protected $fillable = [
        'dosen_id',
        'nama_dosen',
        'jabatan',
        'judul',
        'prodi',
        'tahun',
        'sumber_dana',
        'status',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function filePenelitian()
    {
        return $this->hasMany(FilePenelitian::class);
    }

    public function komentarPenelitian()
    {
        return $this->hasMany(KomentarPenelitian::class);
    }

    public function kolaboratorPenelitian()
    {
        return $this->belongsToMany(Dosen::class, 'kolaborator_penelitian');
    }
}
