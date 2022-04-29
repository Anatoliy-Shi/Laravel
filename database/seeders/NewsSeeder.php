<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use function Illuminate\Events\queueable;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getNews());
    }

    private function getNews()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'title' => $faker->realText('10'),
                'slug' => Str::slug('$slug'),
                'description' => $faker->realText('150'),
            ];
        }
        return $data;
    }
}

