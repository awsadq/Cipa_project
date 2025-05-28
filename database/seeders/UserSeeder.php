<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user'
        ]);

        $user->profile()->create([
            'full_name' => 'Тестовый Пользователь',
            'phone' => '+996700000000',
        ]);
    }
}
