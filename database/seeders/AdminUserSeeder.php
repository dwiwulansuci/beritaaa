<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Atmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Pengguna Aseli',
            'email' => 'user@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
