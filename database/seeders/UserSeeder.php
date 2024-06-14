<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
        public function run(): void
        {
        // Создаем пользователя с ролью администратора
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Используйте bcrypt для хэширования пароля
            'role' => 'admin',
        ]);

        // Создаем пользователей с ролью модератора
        $moderator1 = User::create([
            'name' => 'Moderator One',
            'email' => 'moderator1@example.com',
            'password' => bcrypt('password'),
            'role' => 'moderator',
        ]);

        $moderator2 = User::create([
            'name' => 'Moderator Two',
            'email' => 'moderator2@example.com',
            'password' => bcrypt('password'),
            'role' => 'moderator',
        ]);
    }
}
