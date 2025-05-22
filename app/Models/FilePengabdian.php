<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilePengabdian extends Model
{
    use HasFactory;
    protected $table = 'file_pengabdian';
    
    protected $fillable = [
        'pengabdian_id',
        'file_path',
        'nama_file',
        'tipe',
        'size',
    ];

    public function pengabdian()
    {
        return $this->belongsTo(Pengabdian::class);
    }
}
