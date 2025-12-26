<?php

namespace App\Http\Controllers;
use App\Http\Managers\UserManager;
use Illuminate\Http\Request;
use App\Models\UserTp;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{


    public function inserttotable(Request $request)
    {
        $user = new UserManager();
        $insert = $user->insertUser($request->firstname, $request->lastname, $request->email, $request->password, $request->gender, $request->age);
        Session::put('useremail', $request->email);
        Session::put('userpass', $request->password);
        return redirect('/Movies');
    }


    public function getAllMovies(Request $request)
{
    $movies = \App\Models\Movie::with('reviews')->get();

    // Optionally compute average ratings for each movie
    foreach ($movies as $movie) {
        $movie->avg_rating = round($movie->reviews->avg('rating'), 1);
    }

    return view('movies', compact('movies'));
}

    public function getmoviebyTitle($id)
    {
        $usermangerr = new UserManager();
        $movie = $usermangerr->getmoovieeid($id);
        return $movie;
    }

    public function getreviews($id)
    {
        Session::put('movieid', $id);
        $userrmangerr = new UserManager();
        $reviews = $userrmangerr->getallreviews($id);
        return $reviews;
    }

    public function checklogin(Request $request)
    {
        $usermanagersss = new UserManager();
        $logged = $usermanagersss->loginchecking($request->email, $request->password);
        if ($logged == 'user') {
            $login = 'User logged in successfully';
            Session::put('useremail', $request->email);
            Session::put('userpass', $request->password);
            return view('login', compact('login'));
        } elseif ($logged == 'admin') {
            $login = 'Admin logged in successfully';
            Session::put('adminemail', $request->email);
            Session::put('adminpass', $request->password);
            return view('login', compact('login'));
        } else {
            return view('login', compact('logged'));
        }
    }

    public function getuserid()
    {
        $usemang = new UserManager();
        $useremail = Session::get('useremail');
        $userid = $usemang->getuserrrid($useremail);
        return $userid;
    }

    public function addreview(Request $request)
    {
        $userid = $this->getuserid();
        $useman = new UserManager();
        $movie = Session::get('movieid');
        $useman->addreviews($request->title, $movie, $userid, $request->rating, $request->review_content);
        return redirect("/searching/{$movie}");
    }

    public function getAllMoviesadmin(Request $request)
    {
        $usermangerssssssss = new UserManager();
        $moviesss = $usermangerssssssss->getmoovies();
        return view('Admin', compact('moviesss'));
    }

    public function addmoviess(Request $request)
    {
        $imageName = $request->file('thumbnail')->getClientOriginalName();
        $usrmang = new UserManager();
        $usrmang->addingmovie($request->title, $request->production_year, $imageName, $request->duration, $request->genre, $request->description, $request->synopsis);
        return redirect("/admin");
    }

    public function deletemovie($id)
    {
        $usmang = new UserManager();
        $usmang->deletemoviebyid($id);
        return redirect('/admin');
    }

    public function updatemovie($id, Request $request)
    {
        $imageNames = $request->file('thumbnail')->getClientOriginalName();
        $usermang = new UserManager();
        $usermang->updatemoviebyid($id, $request->title, $request->production_year, $imageNames, $request->duration, $request->genre, $request->description, $request->synopsis);
        return redirect("/admin");
    }

    public function search(Request $request)
    {
        $query = $request->input('query', '');

        $usmang = new UserManager();

        if ($query == '') {
            $movies = $usmang->getmoovies();
        } else {
            $movies = $usmang->searching($query);
        }

        return view('movies', compact('movies'));
    }


public function showMovie($id)
{
    // Get the movie details
    $movie = \App\Models\Movie::findOrFail($id);

    // Get all reviews for that movie
    $reviews = \App\Models\Review::where('movie_id', $id)->get();

    // ✅ Compute the average rating (rounded to 1 decimal)
    $avgRating = $reviews->count() ? round($reviews->avg('rating'), 1) : null;

    // Return the movie detail view
    return view('film', compact('movie', 'reviews', 'avgRating'));
}



}