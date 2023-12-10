<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->nama = 'Administrator';
        $user->alamat = 'Medan';
        $user->no_hp = '081234567890';
        $user->kode_pos = '21456';
        $user->role = 1;
        $user->save();
    }
}
