<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $adminPlainPassword = 'adminpassword123'; 
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make($adminPlainPassword), 
        ]);
        $admin->assignRole('admin');

      
        $users = [
            ['name' => 'Jane Smith', 'email' => 'jane1234@example.com', 'password' => 'janepassword'],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'password' => 'alicepassword'],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'password' => 'bobpassword'],
            ['name' => 'Charlie Davis', 'email' => 'charlie@example.com', 'password' => 'charliepassword'],
            ['name' => 'Diana Evans', 'email' => 'diana@example.com', 'password' => 'dianapassword'],
        ];

      
        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']), 
                'remember_token' => Str::random(10), 
            ]);

          
            $user->assignRole('user');
        }
    }
}
