<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Book::create([
                'writer_id' => $faker->numberBetween(1, 10),
                'title' => $faker->sentence(3), // Judul buku dengan 3 kata
                'image_url' => 'bookImg/quTskO8XfvBT3aQtkt2aGlCCsGuN4cvYpfZyNO18.jpg',
                'genre' => $faker->randomElement(['horror', 'comedy', 'drama', 'action', 'others']),
                'description' => $faker->paragraph(), // Deskripsi buku
                'price' => $faker->numberBetween(50000, 200000), // Harga antara 50.000 - 200.000
            ]);
        }
    }
}
