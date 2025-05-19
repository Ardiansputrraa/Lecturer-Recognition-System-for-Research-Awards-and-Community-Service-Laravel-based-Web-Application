<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomentarPenelitian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'komentar_penelitians';

    protected $fillable = [
        'penelitian_id',
        'komentar',
        'created_at',
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class);
    }
}
