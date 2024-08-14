<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks'; // Nama tabel di database

    protected $fillable = [
        'agenda', 'jenis_agenda', 'duration_plan', 'duration_execute', 'tgl_mulai_r', 'tgl_selesai_r', 'tgl_mulai_p', 'tgl_selesai_p', 'pengubah', 'alasan', 'dokumentasi'
    ]; // Kolom yang diizinkan untuk mass assignment

    // Jika Anda memiliki timestamps di tabel Anda (created_at dan updated_at)
    public $timestamps = true;
}
