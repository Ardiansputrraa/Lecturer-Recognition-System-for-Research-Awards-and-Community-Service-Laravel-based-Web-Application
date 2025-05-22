<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KolaboratorPengabdian extends Model
{
    use HasFactory;
    protected $table = 'kolaborator_pengabdian';

    protected $fillable = [
        'pengabdian_id',
        'dosen_id',
    ];

    public function pengabdian()
    {
        return $this->belongsTo(Pengabdian::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
