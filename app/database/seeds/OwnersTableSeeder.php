<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 2/9/2015
 * Time: 9:12 AM
 */
use Faker\Factory as Faker;

class OwnersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $index)
        {
            Owner::create([
                'username' => $faker->word,
                'email' => $faker->email,
                'password' => $faker->word
            ]);
        }
    }
}