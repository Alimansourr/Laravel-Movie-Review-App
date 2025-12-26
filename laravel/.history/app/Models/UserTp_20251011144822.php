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

public function reviews()
{
    return $this->hasMany(\App\Models\Review::class, 'user_id'); // 👈 same here
}

    
}
