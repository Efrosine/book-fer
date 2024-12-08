<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Writer;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Writer::create([
                'name' => $faker->name,
                'image_url' => 'writerImg/zpr2FCl2mI5ZY76lcUiEcjxEVBkGtn1l1uBAwgNY.jpg',
            ]);
        }
    }
}
