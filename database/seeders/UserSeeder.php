<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'lastname' => 'Asad',
            'farstname' => 'Nazifi',
            'email' => 'asad15nazifi@gmail.com',
            'password' => Hash::make('Asad1nazifi@#'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        // 🔸 ایجاد کاربر تستی
        User::factory()->count(100)->create();
    }
}
