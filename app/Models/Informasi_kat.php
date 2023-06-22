<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi_kat extends Model
{
    use HasFactory;
    protected $table = 'informasi_kategori';
    protected $fillable = [
        'informasi',
        'kategori_id',
    ];

    public function informasi_kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
