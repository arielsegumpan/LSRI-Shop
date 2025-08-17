<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'aye',
                'email' => 'aye@gmail.com',
                'password' => bcrypt('qwerty12345'),
                'role' => 'super_admin',
            ],
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'juan@gmail.com',
                'password' => bcrypt('qwerty12345'),
                'role' => 'mechanic',
            ],
            [
                'name' => 'Customer User',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('qwerty12345'),
                'role' => 'customer',
            ],
            [
                'name' => 'Customer User 2',
                'email' => 'customer2@gmail.com',
                'password' => bcrypt('qwerty12345'),
                'role' => 'customer',
            ],
        ];

        foreach ($users as $data) {
            // Ensure the role exists
            $role = Role::firstOrCreate(['name' => $data['role']]);

            // Create or update the user
            $user = User::updateOrCreate(
                ['email' => $data['email']], // condition to check existing
                [
                    'name' => $data['name'],
                    'password' => $data['password'],
                ]
            );

            // Assign the role (remove old roles and sync new one)
            $user->syncRoles([$role]);
        }
    }
}
