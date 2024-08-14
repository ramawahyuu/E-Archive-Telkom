<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal2 extends Model
{
    use HasFactory;
    protected $table = 'proposals2';
    protected $fillable = ['program_kerja', 'status', 'file'];
}
