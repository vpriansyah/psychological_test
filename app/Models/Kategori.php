<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_tes';
    protected $fillable = [
        'kategori',
        'ambang_batas',
    ];

    public function kategori()
    {
        return $this->hasMany(Poin::class, 'kategori_id');
    }

    public function informasi_kategori()
    {
        return $this->hasMany(Informasi_kat::class, 'kategori_id');
    }
}
