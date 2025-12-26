<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
public function showtimes()
{
    return $this->hasMany(MovieCinemaShowtime::class);
}

public function availableCinemas()
{
    return $this->belongsToMany(Cinema::class, 'movie_cinema_showtimes')->distinct();
}


public function reservations() {
    return $this->hasMany(Reservation::class);
}

public function reviews()
{
    return $this->hasMany(\App\Models\Review::class);
}

public function averageRating()
{
    return $this->reviews()->avg('rating');
}


}
