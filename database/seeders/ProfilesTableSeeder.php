<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Faker\Factory as Faker;  
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();  
        $users = User::all();
        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id,
                'about' => $faker->text(100),
                'company' => $faker->company,
                'country' => $faker->country,
                'city' => $faker->city,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
        // foreach (range(1, 20) as $index) {  
        //     Profile::create([  
        //         'name' => $faker->name,  
        //         'email' => $faker->unique()->safeEmail,  
        //         'role_type' => $faker->randomElement(['dokter', 'admin_sistem', 'perawat', 'administrasi', 'pasien', 'manajer', 'apoteker', 'umum']),  
        //         'password' => Hash::make('password'), // Use a secure password  
        //     ]);  
        // }  
    }
}
