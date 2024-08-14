<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task3 extends Model
{
    use HasFactory;

    protected $table = 'tasks3'; // Nama tabel di database

    protected $fillable = [
        'agenda', 'jenis_agenda', 'duration_plan', 'duration_execute', 'tgl_mulai_r', 'tgl_selesai_r', 'tgl_mulai_p', 'tgl_selesai_p', 'pengubah', 'alasan'
    ]; // Kolom yang diizinkan untuk mass assignment

    // Jika Anda memiliki timestamps di tabel Anda (created_at dan updated_at)
    public $timestamps = true;
}
