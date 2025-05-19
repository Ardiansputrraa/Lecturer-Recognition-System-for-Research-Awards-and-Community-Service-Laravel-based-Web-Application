<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_telepon',
        'foto_profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
