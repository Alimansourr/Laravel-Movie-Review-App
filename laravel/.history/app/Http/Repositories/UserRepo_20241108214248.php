<?php
namespace App\Http\Repositories;
use App\Models\UserTp;
use App\Models\Movie;
use App\Models\Review;

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
    ->get();return $review;
}

}

?>