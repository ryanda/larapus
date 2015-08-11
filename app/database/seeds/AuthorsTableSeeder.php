<?php

use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();


        Author::truncate();

        foreach(range(1, 5) as $index)
        {
            Author::create([
                'name' => $faker->name,
            ]);
        }
    }
}
