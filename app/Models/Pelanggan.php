<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->hasOne(Golongan::class, 'id', 'id_gol');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public static function generateNoPelanggan()
    {
        $date = Carbon::now()->format('dmy');

        $lastNo = Self::select('no_pelanggan')
                    ->where('no_pelanggan', 'LIKE', 'NP'.$date.'%')
                    ->orderBy('no_pelanggan', 'desc')
                    ->first();

        $urut = $lastNo ? substr($lastNo->no_pelanggan, 8) + 1 : 1;
        $noPelanggan = 'NP' . $date . sprintf('%03d', $urut);

        return $noPelanggan;
    }
}
