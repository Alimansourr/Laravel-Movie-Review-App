<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieCinemaShowtime;
use App\Models\Cinema;

class BookingController extends Controller
{
public function showCinemas($movieId)
    {
        $movie = Movie::findOrFail($movieId);

        // ✅ Get unique cinemas that actually have showtimes for this movie
        $cinemaIds = MovieCinemaShowtime::where('movie_id', $movieId)
            ->pluck('cinema_id')
            ->unique();

        $cinemas = Cinema::whereIn('id', $cinemaIds)->get();

        return view('cinemas.select', compact('movie', 'cinemas'));
    }
}
