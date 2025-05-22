<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileHki extends Model
{
    use HasFactory;
    protected $table = 'file_hki';
    
    protected $fillable = [
        'hki_id',
        'file_path',
        'nama_file',
        'tipe',
        'size',
    ];

    public function hki()
    {
        return $this->belongsTo(Hki::class);
    }
}
