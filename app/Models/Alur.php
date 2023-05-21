<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alur extends Model
{
    use HasFactory;
    protected $fillable = [
        'alur_pengerjaan',
    ];
    protected $table = 'alur';
}
