<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'keperluan',
    ];
    protected $table = 'ajuan';
}
