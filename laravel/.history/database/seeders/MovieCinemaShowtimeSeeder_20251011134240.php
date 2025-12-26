<?php

use Illuminate\Database\Seeder;
use App\Models\MovieCinemaShowtime;

class MovieCinemaShowtimeSeeder extends Seeder
{
    public function run()
    {
        MovieCinemaShowtime::create([
            'movie_id' => 1,
            'cinema_id' => 1,
            'show_date' => '2025-10-12',
            'show_time' => '14:30:00',
            'total_seats' => 100,
            'available_seats' => 100,
        ]);
    }
}
