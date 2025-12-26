<?php

use App\Models\UserTp;
use PhpParser\Node\Stmt\Else_;

class UserRepo{

public function checkUserexists($email){
    $exists=UserTp::where('email','=',$email);
    if($exists){
        $message="User is already defined";
    }
    Else
}

}

?>