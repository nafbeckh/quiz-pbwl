<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gol', 'no_pelanggan', 'nama', 'alamat', 'no_hp', 'ktp',
        'seri', 'meteran', 'status', 'id_user'
    ];

    public function golongan(): HasOne
    {
        return $this->hasOne(Golongan::class, 'id_gol', 'id');
    }
}
