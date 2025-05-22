<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';

    protected $fillable = [
        'dosen_id',
        'nama_dosen',
        'kontributor',
        'tahun',
        'judul',
        'jenis',
        'penerbit',
        'status',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function filePublikasi()
    {
        return $this->hasMany(FilePublikasi::class);
    }

    public function komentarPublikasi()
    {
        return $this->hasMany(KomentarPublikasi::class);
    }

    public function kolaboratorPublikasi()
    {
        return $this->belongsToMany(Dosen::class, 'kolaborator_publikasi');
    }
}
