<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@acms.local',
                'password' => 'admin123',
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@acms.local',
                'password' => 'operator123',
            ],
            [
                'name' => 'Security',
                'email' => 'security@acms.local',
                'password' => 'security123',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
