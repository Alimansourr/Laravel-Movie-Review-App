<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;


class MovieCinemaShowtime extends Model
{
    use HasFactory;

    // ✅ Explicitly define table name (optional if matches convention)
    protected $table = 'movie_cinema_showtimes';

    // ✅ Allow mass assignment for these fields
    protected $fillable = [
        'movie_id',
        'cinema_id',
        'show_date',
        'show_time',
        'total_seats',
        'available_seats',
    ];

    // ✅ Relationships

    // Each showtime belongs to one movie
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    // Each showtime belongs to one cinema
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    // Each showtime can have many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'movie_cinema_showtime_id');
    }
}
