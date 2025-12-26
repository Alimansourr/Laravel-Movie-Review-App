<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];

    public function movies() {
        return $this->belongsToMany(Movie::class, 'movie_cinema');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
