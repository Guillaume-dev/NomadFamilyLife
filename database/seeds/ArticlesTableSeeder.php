<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Grace a faker directement je fait 10 articles
        // $faker = Faker::create();
        // for ($article = 0; $article < 10; $article++){
        //     \App\Article::create([
        //         'user_id'=>1,
        //         'title' => $faker->word,
        //         'content' => $faker->text(mt_rand(900, 1500)),
        //         'url' => $faker->imageUrl(400, 240),
        //         'created_at' => $faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now')
        //     ]);
        // }
        //permet de créer des articles (avec les parametres de la factory)

        factory(\App\Article::class, 45)->create();
    }
}
