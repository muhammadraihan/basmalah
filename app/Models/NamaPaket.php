<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class NamaPaket extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name','kategori'
    ];

    public function Kategori(){
        return $this->belongsTo(Kategori::class, 'kategori','uuid');
    }
}
