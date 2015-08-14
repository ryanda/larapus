<?php

use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();


        Book::truncate();

        foreach(range(1, 30) as $index)
        {
            Book::create([
                'title' => $faker->sentence(6),
                'author_id' => $faker->randomNumber(1,5),
                'amount' => $faker->randomNumber(1),
            ]);
        }
    }
}
