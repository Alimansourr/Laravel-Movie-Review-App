<?php
namespace App\Http\Repositories;
use App\Models\UserTp;

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

public function searchall(){
    $datas= UserTp::all();
    return $datas;
}

public function searchName($firstname,$lastname){
    $values=UserTp::where('firstname', 'like', '%' . $firstname . '%')
    ->orWhere('lastname', 'like', '%' . $lastname . '%')->get();
    return $values;
}

}

?>