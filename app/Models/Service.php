<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_upload_id',
        'perapihan_paragraf',
        'nomor_halaman',
        'daftar_isi',
        'daftar_tabel',
        'daftar_gambar',
    ];

    public function fileUpload()
    {
        return $this->belongsTo(FileUpload::class);
    }
}
