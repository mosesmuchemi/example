<?php
/**
 * Created by PhpStorm.
 * User: moziz
 * Date: 2/1/2015
 * Time: 6:39 PM
 */


// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LessonTagTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $lessonIds = Lesson::lists('id');

        $tagIds = Tag::lists('id');

        foreach(range(1, 30) as $index)
        {
            //need a real lesson id and real tag id
            DB::table('lesson_tag') -> insert([

                'lesson_id' => $faker -> randomElement($lessonIds),
                'tag_id' => $faker -> randomElement($tagIds)
            ]);
        }
    }

}