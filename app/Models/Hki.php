<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hki extends Model
{
    protected $table = 'hki';

    protected $fillable = [
        'dosen_id',
        'nama_dosen',
        'hak_cipta',
        'tahun',
        'judul',
        'jenis',
        'status',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function fileHki()
    {
        return $this->hasMany(FileHki::class);
    }

    public function komentarHki()
    {
        return $this->hasMany(KomentarHki::class);
    }

    public function kolaboratorHki()
    {
        return $this->belongsToMany(Dosen::class, 'kolaborator_hki');
    }
}
