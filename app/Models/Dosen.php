<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $primaryKey = 'id_dosen';
    protected $fillable = ['id_dosen','nama_dosen', 'bidang_pkm', 'program_studi', 'no_tlp', 'email'];
}
