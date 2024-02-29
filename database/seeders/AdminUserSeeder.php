<?php

namespace Database\Seeders;

use App\Models\Admin_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin_user::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), 
            'role_id' => 1, 
            'phone' => '1234567890',
            'address' => '123 Admin Street',
            'gender' => 'Female', 
            'is_active' => true,
        ]);
    }
}
