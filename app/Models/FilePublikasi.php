<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilePublikasi extends Model
{
    use HasFactory;
    protected $table = 'file_publikasi';
    
    protected $fillable = [
        'publikasi_id',
        'file_path',
        'nama_file',
        'tipe',
        'size',
    ];

    public function publikasi()
    {
        return $this->belongsTo(Publikasi::class);
    }
}
