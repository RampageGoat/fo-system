<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Booking;
use App\Models\RoomTypes;
use App\Models\Customers;
use App\Models\Test;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'yulioang@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // User::factory(10)->create();
        Customers::factory(50)->create();

        // Customers::create([
        //     'name' => 'Yulio Angwyn Sutikno',
        //     'nik' => '1407021611000004',
        //     'gender' => 'Laki-laki',
        //     'telepon' => '082286178367',
        //     'alamat' => 'Jl. Gedung Nasional No.18B Kec.Bangko, Kab.Rokan Hilir, Riau, Sumatera', 
        //     'ttl' => 'Semarang, 16/11/2000'
        // ]);

        // Customers::create([
        //     'name' => 'Anggunita Shekina Happy',
        //     'nik' => '1407021012000004',
        //     'gender' => 'Perempuan',
        //     'telepon' => '082226493768',
        //     'alamat' => 'Jl. Gedung Nasional No.18B Kec.Bangko, Kab.Rokan Hilir, Riau, Sumatera', 
        //     'ttl' => 'Bandungan, 10/12/2000'
        // ]);


        RoomTypes::create([
            'name' => 'Superior Room',
            'price' => 250000,
            'description' => 'sumthing',
            'image' => ''
        ]);
        
        RoomTypes::create([
            'name' => 'Executive Room',
            'price' => 450000,
            'description' => 'sumthing',
            'image' => ''
        ]);
        
        RoomTypes::create([
            'name' => 'Superior Family Room',
            'price' => 350000,
            'description' => 'sumthing',
            'image' => ''
        ]);

        RoomTypes::create([
            'name' => 'Deluxe Room',
            'price' => 400000,
            'description' => 'sumthing',
            'image' => ''
        ]);

        RoomTypes::create([
            'name' => 'Deluxe Family Room',
            'price' => 550000,
            'description' => 'sumthing',
            'image' => ''
        ]);

        Booking::factory(200)->create();

    }
}
