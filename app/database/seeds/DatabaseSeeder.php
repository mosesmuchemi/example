<?php

class DatabaseSeeder extends Seeder {

	/**
	 * @var array
     */
	private $tables = [
		'lessons',
		'tags',
		'lesson_tag',
		'owners',
		'contacts'

	];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->cleanDatabase();

		Eloquent::unguard();


		$this->call('LessonsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('LessonTagTableSeeder');
		$this->call('OwnersTableSeeder');
		$this->call('ContactsTableSeeder');

	}

	private function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this -> tables as $tableName){

			DB::table($tableName) -> truncate();
		}

/*
		Lesson::truncate();

		Tag::truncate();

		DB::table('lesson_tag')->truncate();*/

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
