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
    ];

    public function kategori()
    {
        return $this->hasMany(Poin::class, 'kategori_id');
    }
}
