<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_tes extends Model
{
    use HasFactory;
    protected $table = 'hasil_test';
    protected $fillable = [
        'jumlah_poin',
        'peserta_id',
        'status_id',
        'hasil_keputusan',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'peserta_id');
    }
}
