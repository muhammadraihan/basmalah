<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Testimoni extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'video', 'judul', 'nama_jemaah', 'umur', 'nama_paket', 'tanggal'
    ];
}
