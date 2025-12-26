<?php
namespace App\Http\Repositories;
use App\Models\UserTp;

class UserRepo {

    public function checkUserExists($email) {
        $exists = UserTp::where('email', '=', $email)->exists();
        return $exists ? "User is already defined" : "User is not defined";
    }

    public function searchAll() {
        return UserTp::all();
    }

    public function searchName($firstname = null, $lastname = null) {
        $query = UserTp::query();

        if ($firstname) {
            $query->where('firstname', 'like', '%' . $firstname . '%');
        }

        if ($lastname) {
            $query->where('lastname', 'like', '%' . $lastname . '%');
        }

        $results = $query->get();

        return $results->isEmpty() ? "No matching users found" : $results;
    }

    
}
?>
