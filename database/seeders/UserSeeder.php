<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@barbershop.com',
            'password' => Hash::make('password'),
            'email_verified_at' => '2026-02-21 07:16:30',
        ]);
    }
}
