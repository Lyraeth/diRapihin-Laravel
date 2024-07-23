<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'original_filename', 'note'];

    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
