<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 25; $i++) {
            $isbn = $faker->sentence(6);
            $image = $faker->imageUrl(800, 400, 'cats', true, 'Faker');
            $judul = $faker->paragraph(20);
            $views = $faker->numberBetween(0, 100);
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('Book')->insert([
                'isbn' => 'isbn',
                'image' => 'image',
                'judul' => 'judul',
                'views' => 'views',
                'published_at' => 'created_at',
                'created_at' => 'created_at',
                'update_at' => 'created_at',
            ]);
        }
    }
}
