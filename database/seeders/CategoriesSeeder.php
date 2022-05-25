<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

	private function getData(): array
	{
		$faker = Factory::create('ru_RU');
		$data = [];

		for($i=0; $i < 10; $i++) {
			$data[] = [
				'title' => $faker->realText($maxNbChars = 10,  $indexSize = 3),
				'description' => $faker->realText($maxNbChars = 100,  $indexSize = 2)
			];
		}

		return $data;
	}
}
