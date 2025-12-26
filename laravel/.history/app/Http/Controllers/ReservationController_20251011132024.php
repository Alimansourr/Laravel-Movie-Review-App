<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Reservation;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        // Validate form input
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'cinema_id' => 'required|exists:cinemas,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'seats' => 'required|integer|min:1|max:10',
        ]);

        // ✅ Use your session-based user system
        $useremail = Session::get('useremail');

        if (!$useremail) {
            return redirect('/login')->with('error', 'Please log in to make a reservation.');
        }

        // Use your existing UserManager to get the user ID
        $userManager = new \App\Http\Managers\UserManager();
        $userid = $userManager->getuserrrid($useremail);

        if (!$userid) {
            return redirect('/login')->with('error', 'User not found.');
        }

        Reservation::create([
            'user_id' => $userid,
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
