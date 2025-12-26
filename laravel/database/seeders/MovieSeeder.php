<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Inception',
                'production_year' => 2010,
                'thumbnail' => 'inception.jpg',
                'duration' => 148,
                'genre' => 'Sci-Fi',
                'description' => 'A mind-bending thriller about dream invasion.',
                'synopsis' => 'Dom Cobb steals secrets from dreams, but his toughest mission yet might be escaping his own mind.',
            ],
            [
                'title' => 'The Dark Knight',
                'production_year' => 2008,
                'thumbnail' => 'dark_knight.jpg',
                'duration' => 152,
                'genre' => 'Action',
                'description' => 'Batman faces his greatest foe — The Joker.',
                'synopsis' => 'Gotham’s silent guardian fights chaos personified in a battle of morality and madness.',
            ],
            [
                'title' => 'Interstellar',
                'production_year' => 2014,
                'thumbnail' => 'interstellar.jpg',
                'duration' => 169,
                'genre' => 'Adventure',
                'description' => 'A journey beyond the stars to save humanity.',
                'synopsis' => 'A team of astronauts ventures through a wormhole to find a new habitable planet for mankind.',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
