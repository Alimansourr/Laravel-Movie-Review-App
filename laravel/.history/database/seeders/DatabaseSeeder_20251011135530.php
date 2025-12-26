<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MovieCinemaShowtimeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
   public function run(): void
{
    $this->call([
        CinemaSeeder::class,
        MovieSeeder::class,
        MovieCinemaShowtimeSeeder::class,
    ]);
}

}
