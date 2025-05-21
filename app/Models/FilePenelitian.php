<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilePenelitian extends Model
{
    use HasFactory;
    protected $table = 'file_penelitian';
    
    protected $fillable = [
        'penelitian_id',
        'file_path',
        'nama_file',
        'tipe',
        'size',
    ];

    public function penelitian()
    {
        return $this->belongsTo(Penelitian::class);
    }
}
