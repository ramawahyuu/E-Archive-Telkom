<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi'; // Nama tabel di database

    protected $fillable = [
        'judul', 'deskripsi1', 'gambar1', 'deskripsi2', 'gambar2'
    ]; // Kolom yang diizinkan untuk mass assignment

    // Jika Anda memiliki timestamps di tabel Anda (created_at dan updated_at)
    public $timestamps = true;
}