<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun Peserta
        User::create([
            'name' => 'Peserta Test',
            'email' => 'peserta@mfpacademy.com',
            'password' => Hash::make('password123'),
            'role' => 'peserta',
        ]);

        // Buat akun Coach
        User::create([
            'name' => 'Coach Test',
            'email' => 'coach@mfpacademy.com',
            'password' => Hash::make('password123'),
            'role' => 'coach',
        ]);
    }
}
