<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'movie_id', 'cinema_id',
        'show_date', 'show_time', 'seats', 'status'
    ];

    public function user()   { return $this->belongsTo(User::class); }
public function movie()
{
    return $this->belongsTo(\App\Models\Movie::class);
}

public function cinema()
{
    return $this->belongsTo(\App\Models\Cinema::class);
}

}
