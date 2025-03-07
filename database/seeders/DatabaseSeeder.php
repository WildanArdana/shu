<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama_anggota' => 'Admin',
            'no_anggota' => 'ADMIN123',
            'role' => 'admin',
        ]);
    }
}
