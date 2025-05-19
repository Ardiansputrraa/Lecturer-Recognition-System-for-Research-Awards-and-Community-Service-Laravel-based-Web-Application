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
}
