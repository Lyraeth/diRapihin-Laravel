<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'filename', 'original_filename', 'file_size', 'status', 'note', 'user_id'];

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $date = now()->format('Ymd');
            $latestInvoice = self::whereDate('created_at', today())->count() + 1;
            $model->invoice_id = 'INV-' . $date . '-' . str_pad($latestInvoice, 4, '0', STR_PAD_LEFT);
        });
    }

    public function getFormattedFileSizeAttribute()
    {
        $size = $this->file_size;

        if ($size >= 1048576) {
            return round($size / 1048576, 2) . ' MB';
        } elseif ($size >= 1024) {
            return round($size / 1024, 2) . ' KB';
        } else {
            return $size . ' bytes';
        }
    }

    public function getFormattedFileSizePedomanAttribute()
    {
        $size_pedoman = $this->file_size_pedoman;

        if ($size_pedoman >= 1048576) {
            return round($size_pedoman / 1048576, 2) . ' MB';
        } elseif ($size_pedoman >= 1024) {
            return round($size_pedoman / 1024, 2) . ' KB';
        } else {
            return $size_pedoman . ' bytes';
        }
    }
}
