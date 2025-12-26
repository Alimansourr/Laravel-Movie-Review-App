<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Reservation;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\MovieCinemaShowtime;

class ReservationController extends Controller
{

public function create($movie_id, $cinema_id)
{
    $movie = Movie::findOrFail($movie_id);
    $cinema = Cinema::findOrFail($cinema_id);

    // ✅ Fetch showtimes for this movie and cinema
    $showtimes = MovieCinemaShowtime::where('movie_id', $movie_id)
        ->where('cinema_id', $cinema_id)
        ->orderBy('show_date')
        ->orderBy('show_time')
        ->get();

    // ✅ Pass all variables to the view
    return view('bookings.create', compact('movie', 'cinema', 'showtimes'));
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

    $useremail = Session::get('useremail');
    if (!$useremail) {
        return redirect('/login')->with('error', 'Please log in to make a reservation.');
    }

    $userManager = new \App\Http\Managers\UserManager();
    $userid = $userManager->getuserrrid($useremail);

    // ✅ Check showtime record
    $showtime = MovieCinemaShowtime::where('movie_id', $request->movie_id)
        ->where('cinema_id', $request->cinema_id)
        ->where('show_date', $request->show_date)
        ->where('show_time', $request->show_time)
        ->first();

    if (!$showtime) {
        return back()->with('error', 'Showtime not found for this cinema.');
    }

    if ($showtime->available_seats < $request->seats) {
        return back()->with('error', 'Not enough seats available.');
    }

    // ✅ Create reservation
    Reservation::create([
        'user_id' => $userid,
        'movie_id' => $request->movie_id,
        'cinema_id' => $request->cinema_id,
        'show_date' => $request->show_date,
        'show_time' => $request->show_time,
        'seats' => $request->seats,
        'status' => 'confirmed',
    ]);

    // ✅ Decrease available seats
    $showtime->available_seats -= $request->seats;
    $showtime->save();

    return redirect('/Movies')->with('success', 'Reservation successful!');
}
public function myBookings()
{
    $userEmail = session('useremail');

    if (!$userEmail) {
        return redirect('/login')->with('error', 'Please log in to view your bookings.');
    }

    $userManager = new \App\Http\Managers\UserManager();
    $userId = $userManager->getuserrrid($userEmail);

    $reservations = \App\Models\Reservation::where('user_id', $userId)
        ->with(['movie', 'cinema'])
        ->orderBy('show_date', 'desc')
        ->orderBy('show_time', 'desc')
        ->get();

    return view('bookings.mybookings', compact('reservations'));
}


}
