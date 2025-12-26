<?php
namespace App\Http\Managers; 

use Illuminate\Http\Request;
use App\Models\UserTp;
use App\Http\Repositories\UserRepo;


class UserManager{
public function insertUser($firstname, $lastname,$email,$password,$gender,$age){
    $userRepo = new UserRepo();
    $exists = $userRepo->checkUserExists($email); // Call the method

    if ($exists === "User is already defined") {
        $message = "Already defined";
    }
else{
$usertp = new UserTp();
$usertp->firstname = $firstname;
$usertp->lastname = $lastname;
$usertp->email = $email;
$usertp->password = bcrypt($password);
$usertp->role='user';
$usertp->gender = $gender;
$usertp->age=$age;
$usertp->save();
$message = "User successfully created";
}
return $message;

}

public function getmoovies(){
    $userrep=new UserRepo();
    $movies= $userrep->gettingAllMovies();
    return $movies;
}

public function getmoovieeid($id){
    $userrepp=new UserRepo();
    $movie= $userrepp->gettingid($id);
    return $movie;

}

public function getallreviews($movieid){
    $userreppo=new UserRepo();

$reviews= $userreppo->getallrev($movieid);
return $reviews; 
}


public function loginchecking($email,$password){
    $userrepository= new UserRepo();
    $checklog= $userrepository->checkinglogin($email,$password);
    $message='';
    if($checklog){
        return $checklog->role;
    }
    else{
        $message='please signup';
        return $message;
    }
   
}

public function addreviews($title,$movieid,$userid,$rating,$description){
$userrrepoo = new UserRepo();
$userrrepoo->addingreview($title,$movieid,$userid,$rating,$description);
}

public function getuserrrid($email){
$user= new UserRepo();
$userid= $user->getuser($email);
return $userid;
}


public function addingmovie($title,$prodyear,$thumbnail,$duration,$genre,$description,$synopsis){
    $userre= new UserRepo();
    $userre->insertmovie($title,$prodyear,$thumbnail,$duration,$genre,$description,$synopsis);
    
}
public function getUserByEmail($email)
{
    return \App\Models\UserTp::where('email', $email)->first();
}

public function updateUserInfo($email, $firstname, $lastname, $age, $gender, $password)
{
    $user = \App\Models\UserTp::where('email', $email)->first();
    if ($user) {
        $user->firstname = $firstname;
        $user->lastname  = $lastname;
        $user->age       = $age;
        $user->gender    = $gender;
        if (!empty($password)) {
            $user->password = $password; // You can hash this later
        }
        $user->save();
    }
}

public function deletemoviebyid($id){
    $usrep= new UserRepo();
    $usrep->deletingmovbyid($id);
}

public function updatemoviebyid($id,$title,$prodyear,$thumbnail,$duration,$genre,$description,$synopsis){
    $userreposs= new UserRepo();
    $userreposs->updatingmov($id,$title,$prodyear,$thumbnail,$duration,$genre,$description,$synopsis);
}
public function searching($query){
    $userr=new UserRepo();
    $movie= $userr->searchmovie($query);
    return $movie;
    }



}
?>