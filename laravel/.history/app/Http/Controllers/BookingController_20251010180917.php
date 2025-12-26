<?php
namespace App\Http\Controllers;

use App\Models\Movie;

class BookingController extends Controller
{
    public function showCinemas($id)
    {
        $movie = Movie::with('cinemas')->findOrFail($id);
        return view('bookings.cinemas', compact('movie'));
    }
}
