<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Hotel extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name', 'grade', 'location', 'photo'
    ];
}
