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
    $email = $this->email;
    $first = $this->firstname;
    $last = $this->lastname;
    $full = $first . ' ' . $last;

    // 🔍 Log what’s happening (optional)
    // \Log::info("Checking reviews for: $email / $full / $first");

    return \App\Models\Review::where('user', $email)
        ->orWhere('user', $first)
        ->orWhere('user', $full)
        ->orWhere('user', $last)
        ->get();
}



    
}
