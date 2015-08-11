<?php

use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();


        Post::truncate();

        foreach(range(1, 20) as $index)
        {
            Post::create([
                'title' => $faker->sentence(5),
                'content' => $faker->text(400)
            ]);
        }
    }
}
