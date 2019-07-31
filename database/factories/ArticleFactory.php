<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Article;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id'=>1,
        'title' => $faker->word,
        'content' => $faker->text(mt_rand(900, 1500)),
        'url' => $faker->imageUrl(400, 240),
        'created_at' => $faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now')
    ];
});
