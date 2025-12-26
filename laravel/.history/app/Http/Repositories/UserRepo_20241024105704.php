<?php
namespace App\Http\Repositories;
use App\Models\UserTp;

class UserRepo{

public function checkUserexists($email){
    $exists=UserTp::where('email','=',$email);
    if($exists){
        $message="User is already defined";
    }
    else{
        $message="User is not defined";
    }

    return $message;
}

}

?>