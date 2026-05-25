<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kasimbagu.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@kasimbagu.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        $this->command->info('Admin user created successfully.');
        $this->command->info('Email: admin@kasimbagu.com');
        $this->command->info('Password: admin123');
    }
}
