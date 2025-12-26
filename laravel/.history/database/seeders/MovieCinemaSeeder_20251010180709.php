<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Cinema;
use Illuminate\Support\Facades\DB;

class MovieCinemaSeeder extends Seeder
{
    public function run(): void
    {
        $movies = Movie::all();
        $cinemas = Cinema::all();

        // Each movie will be available in 2 random cinemas
        foreach ($movies as $movie) {
            $assigned = $cinemas->random(2)->pluck('id')->toArray();
            foreach ($assigned as $cinema_id) {
                DB::table('movie_cinema')->insert([
                    'movie_id' => $movie->id,
                    'cinema_id' => $cinema_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
