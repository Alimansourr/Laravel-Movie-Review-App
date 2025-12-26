<?php
namespace App\Http\Repositories;
use App\Models\UserTp;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;

class UserRepo{

public function checkUserexists($email){
    $exists=UserTp::where('email','=',$email)->exists();
    if($exists){
        $message="User is already defined";
    }
    else{
        $message="User is not defined";
    }

    return $message;
}


public function gettingAllMovies(){
    $movies= Movie::all();
    return $movies;
}

public function gettingid($id){
    $movie= Movie::where('id','=',$id)->first();
    return $movie;
}


public function getallrev($movieid){
    $review = Review::join('user_tps', 'reviews.user', '=', 'user_tps.id')
    ->where('reviews.movie_id', '=', $movieid)
    ->get();
    return $review;
}

public function checkinglogin($email,$password){
    $user = UserTp::where('email', '=', $email)->first();

    // Check if user exists and password matches
    if ($user && Hash::check($password, $user->password)) {
        return true;
    }

    return false; 
}
}


public function addingreview($title,$movieid,$user,$rating,$description){
$review= new Review();
$review->movie_id=$movieid;
$review->title=$title;
$review->user=$user;
$review->date= Carbon::now();
$review->rating= $rating;
$review->description= $description;
$review->save();
}

?>