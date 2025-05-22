<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KolaboratorPublikasi extends Model
{
    use HasFactory;
    protected $table = 'kolaborator_publikasi';

    protected $fillable = [
        'publikasi_id',
        'dosen_id',
    ];

    public function publikasi()
    {
        return $this->belongsTo(Publikasi::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
