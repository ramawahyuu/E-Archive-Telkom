<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'program_studi',
        'no_hp',
        'nama_tim'
    ];
}
