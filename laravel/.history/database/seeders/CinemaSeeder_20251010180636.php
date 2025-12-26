<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemaSeeder extends Seeder
{
    public function run(): void
    {
        $cinemas = [
            ['name' => 'CineStar Downtown', 'location' => 'New York City'],
            ['name' => 'Galaxy Cinemas', 'location' => 'Los Angeles'],
            ['name' => 'MegaScreen', 'location' => 'Chicago'],
            ['name' => 'Cinema Palace', 'location' => 'Houston'],
            ['name' => 'FilmHub', 'location' => 'San Francisco'],
        ];

        foreach ($cinemas as $cinema) {
            Cinema::create($cinema);
        }
    }
}
