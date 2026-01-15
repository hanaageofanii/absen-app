<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Create Regular Users
        // User::create([
        //     'username' => 'budi',
        //     'email' => 'budi@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'user'
        // ]);

        // User::create([
        //     'username' => 'siti',
        //     'email' => 'siti@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'user'
        // ]);

        // User::create([
        //     'username' => 'andi',
        //     'email' => 'andi@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'user'
        // ]);

        // Create Companies
        // Company::create([
        //     'code' => 'PTN',
        //     'name' => 'PT. Teknologi Nusantara'
        // ]);

        // Company::create([
        //     'code' => 'PMB',
        //     'name' => 'PT. Maju Bersama'
        // ]);

        // Company::create([
        //     'code' => 'PKI',
        //     'name' => 'PT. Karya Indonesia'
        // ]);

        // Company::create([
        //     'code' => 'PGM',
        //     'name' => 'PT. Gemilang Mandiri'
        // ]);

        // Company::create([
        //     'code' => 'PSJ',
        //     'name' => 'PT. Sukses Jaya'
        // ]);
    }
}