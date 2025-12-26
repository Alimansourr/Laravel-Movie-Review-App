<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTp extends Model
{
public function reservations()
{
    return $this->hasMany(\App\Models\Reservation::class, 'user_id'); // 👈 tell Laravel the correct FK
}

public function userReviews()
{
    // Try to match both name and email just in case
    $fullName = $this->firstname . ' ' . $this->lastname;

    return \App\Models\Review::where('user', $this->email)
        ->orWhere('user', $fullName)
        ->get();
}


    
}
