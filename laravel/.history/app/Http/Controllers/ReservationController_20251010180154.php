<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($movie_id, $cinema_id)
    {
        $movie = Movie::findOrFail($movie_id);
        $cinema = Cinema::findOrFail($cinema_id);
        return view('bookings.create', compact('movie', 'cinema'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'cinema_id' => 'required|exists:cinemas,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'seats' => 'required|integer|min:1|max:10',
        ]);

        Reservation::create([
            'user_id' => Auth::id() ?? 1, // placeholder if not logged in
            'movie_id' => $request->movie_id,
            'cinema_id' => $request->cinema_id,
            'show_date' => $request->show_date,
            'show_time' => $request->show_time,
            'seats' => $request->seats,
            'status' => 'confirmed',
        ]);

        return redirect('/Movies')->with('success', 'Reservation successful!');
    }
}
