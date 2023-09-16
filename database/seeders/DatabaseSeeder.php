<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // Assign the 'admin' role
        ]);

        // Create regular user
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user', // Assign the 'user' role
        ]);

        DB::table('jenissampahs')->insert([
            [
                'nama' => 'Plastic Bottles',
                'deskripsi' => 'Recyclable plastic bottles.',
                'foto' => 'bottle.jpg',
                'harga' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Aluminum Cans',
                'deskripsi' => 'Recyclable aluminum cans.',
                'foto' => 'cans.jpg',
                'harga' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ]);
    }
}
