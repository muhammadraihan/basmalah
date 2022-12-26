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
        'kategori', 'nama', 'include', 'exclude', 'harga', 'transportasi', 'hotel', 'status', 'tanggal', 'photo', 'hari', 'detail'
    ];

    public function Transport(){
        return $this->belongsTo(Transport::class, 'transportasi', 'uuid');
    }

    public function Hotel(){
        return $this->belongsTo(Hotel::class, 'hotel', 'uuid');
    }

    public function Kategori(){
        return $this->belongsTo(Kategori::class, 'kategori', 'uuid');
    }

    public function NamaPaket(){
        return $this->belongsTo(NamaPaket::class, 'nama', 'uuid');
    }
}
