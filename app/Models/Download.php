<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Download extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'judul', 'link', 'photo', 'tanggal'
    ];
}
