<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;  
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();  
  
        // foreach (range(1, 99) as $index) {  
        //     User::create([  
        //         'name' => $faker->name,  
        //         'email' => $faker->unique()->safeEmail,  
        //         'role_type' => $faker->randomElement(['dokter', 'admin_sistem', 'perawat', 'administrasi', 'pasien', 'manajer', 'apoteker', 'umum']),  
        //         'password' => Hash::make('password'), // Use a secure password  
        //     ]);  
        // }  

        $users = [
            ['name' => 'Kurnia Rahma', 'email' => 'kurniarpi@yahoo.com', 'role_type' => 'admin'],
           // ['name' => 'Hayuning Sekar Maduretno', 'email' => 'hayuningsm@gmail.com', 'role_type' => 'apoteker'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'role_type' => $user['role_type'],
                'password' => Hash::make('12345678'), // Use a secure password
            ]);
        }
    }
}
