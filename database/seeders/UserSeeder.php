<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin (tanpa nominal_shu)
        User::create([
            'nama_anggota' => 'Admin',
            'no_anggota'   => 'ADMIN001',
            'role'         => 'admin', // Admin role
            'password'     => Hash::make('password'), // Ganti password sesuai kebutuhan
        ]);
    }
}