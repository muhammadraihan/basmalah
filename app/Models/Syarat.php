<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Syarat extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name', 'detail'
    ];

    public function kategoriSyarat(){
        return $this->belongsTo(Kategori_syarat::class, 'name', 'uuid');
    }
}
