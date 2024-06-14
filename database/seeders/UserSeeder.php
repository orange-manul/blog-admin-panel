<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (User::where('email', 'admin@example.com')->exists() ||
            User::where('email', 'moderator1@example.com')->exists() ||
            User::where('email', 'moderator2@example.com')->exists()) {
            $this->command->info('Users already seeded, skipping...');
            return;
        }

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);


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

        $this->command->info('Users seeded successfully.');
    }
}
