<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the eixisting article table and start from scratch
        Article::truncate();

        $faker = \Faker\Factory::create();

        // Creating articles in the database
        for($i = 0; $i < 50; $i++){
            Article::create([
                'title' => $faker->senntence,
                'body' => $faker->paragraph
            ]);
        }
    }
}
