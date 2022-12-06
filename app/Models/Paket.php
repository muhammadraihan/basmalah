<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Paket extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'jenis_paket', 'nama', 'include', 'exclude', 'harga', 'transportasi', 'hotel', 'status', 'tanggal', 'photo', 'hari'
    ];

    public function Transport(){
        return $this->belongsTo(Transport::class, 'transportasi', 'uuid');
    }

    public function Hotel(){
        return $this->belongsTo(Hotel::class, 'hotel', 'uuid');
    }
}
