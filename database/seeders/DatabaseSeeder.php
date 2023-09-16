<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\jenissampah;
use App\Models\jual;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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

        // Define your data here
        $faker = Faker::create();

        // Generate a large number of records
        for ($i = 0; $i < 1000; $i++) { // Adjust the number as needed
            $jenisSampah = jenissampah::inRandomOrder()->first();
            $user = User::inRandomOrder()->first();

            jual::create([
                'jenis_sampah_id' => $jenisSampah->id,
                'user_id' => $user->id,
                'nama' => $faker->name,
                'berat_sampah' => $faker->randomFloat(2, 0, 100), // Adjust the range as needed
                'total_harga' => $faker->randomFloat(2, 0, 1000), // Adjust the range as needed
                'gambar' => $faker->imageUrl(), // Example of generating a random image URL
                'status' => $faker->numberBetween(0, 1), // Adjust as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
