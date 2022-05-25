<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('news')->insert($this->getData());
    }

	private function getData(): array
	{
		$faker = Factory::create('ru_RU');
		$data = [];

		for($i=0; $i < 10; $i++) {
			$title = $faker->jobTitle();
			$data[] = [
				'category_id' => 1,
				'title' => $title,
				'slug'  => \Str::slug($title),
				'description' => $faker->realText($maxNbChars = 200,  $indexSize = 2)
			];
		}

		return $data;
	}
}
