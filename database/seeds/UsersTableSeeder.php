<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($user = 0; $user < 10; $user++){
            \App\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' =>bcrypt('secret')
            ]);
        }

    }
}
