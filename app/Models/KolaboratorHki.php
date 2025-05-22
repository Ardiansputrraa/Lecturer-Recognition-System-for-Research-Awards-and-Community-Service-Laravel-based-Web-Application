<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KolaboratorHki extends Model
{
    use HasFactory;
    protected $table = 'kolaborator_hki';

    protected $fillable = [
        'hki_id',
        'dosen_id',
    ];

    public function hki()
    {
        return $this->belongsTo(Hki::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
