<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Article;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //création de seeder grace a faker
        // $faker = Faker::create();
        // for ($user = 0; $user < 10; $user++){
        //     \App\User::create([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' =>bcrypt('secret')
        //     ]);
        // }

        //permet de créer des utilisateurs sans les relations
        factory(\App\User::class, 20)->create();

        //permet de créer 10 articles chacun écrit par un seul utilisateur
        // factory(\App\User::class, 10)->create()->each(function ($u) {
        //     $u->articles()->save(factory(\App\Article::class)->make());
        // });

        //Permet de creer 20 articles par utilisateur -> 15x 20
        // $user = factory(\App\User::class, 15)->create();
        // $user->each(function ($user) {
        //     factory(\App\Article::class, 20)->create([
        //         'user_id' => $user->id
        //     ]);
        // });
    }
}
