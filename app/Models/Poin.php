<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;
    protected $table = 'paket_soal';
    protected $fillable = [
        'soal',
        'kategori_id',
        'jawaban_A',
        'jawaban_B',
        'jawaban_C',
        'jawaban_D',
        'jawaban_E',
        'poin_A',
        'poin_B',
        'poin_C',
        'poin_D',
        'poin_E',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
