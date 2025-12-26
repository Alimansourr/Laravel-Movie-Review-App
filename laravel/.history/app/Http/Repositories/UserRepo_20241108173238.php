<?php
namespace App\Http\Repositories;
use App\Models\UserTp;
use App\Models\Movie;

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

public function gettingtitle($title){
    $movie= Movie::where('title','=',$title)->first();
}

}

?>