<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 2/9/2015
 * Time: 9:03 AM
 */

use Faker\Factory as Faker;
class ContactsTableSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();
        $contactIds = Owner::lists('id');
        foreach(range(1,10) as $index)
        {
           /* Contact::create([
                'owner_id' => $faker ->randomElement($contactIds),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'twitter' => $faker-> word(),
            ]);*/

            DB::table('contacts') -> insert([

                'owner_id' => $faker ->randomElement($contactIds),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'twitter' => $faker-> word(),
            ]);
        }
    }
}