<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Cabang extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name', 'alamat', 'telp', 'email', 'photo'
    ];
}
