<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tata_tertib extends Model
{
    use HasFactory;
    protected $fillable = [
        'rules_pengerjaan',
    ];
    protected $table = 'rules';
}
