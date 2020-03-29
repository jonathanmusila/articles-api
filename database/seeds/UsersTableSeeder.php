<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table first
        User::truncate();
        
        $faker = \Faker\Factory::create();

        //Hashing the created password
        $password = Hash::make('Password');

        User::create([

            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => $password,

        ]);

        // Generate a few users
        for ($i=0; $i < 5; $i++) { 
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
