<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'username' => 'admin',
            'email' => 'yulioang@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Front Desk Agent',
            'username' => 'frontoffice',
            'email' => 'frontoffice@gmail.com',
            'password' => bcrypt('password')
        ]);


    }
}
