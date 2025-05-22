<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class KolaboratorPenelitian extends Model
{
    use HasFactory;
    protected $table = 'kolaborator_penelitian';

    protected $fillable = [
        'penelitian_id',
        'dosen_id',
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
