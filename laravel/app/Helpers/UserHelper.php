<?php

namespace App\Helpers;
use App\Http\Managers\UserManager;
use Illuminate\Support\Facades\Session;

class UserHelper
{
    public static function getLoggedUserId()
    {
        $email = Session::get('useremail');
        if (!$email) return null;

        $userManager = new UserManager();
        return $userManager->getuserrrid($email);
    }
}
