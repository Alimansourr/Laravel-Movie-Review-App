<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postAdminCreate(Store $session,Request $request){
    
        $firstname= $request->firstname;
        $lastname= $request->lastname;

        echo $firstname." ".$lastname;

    }
}


?>