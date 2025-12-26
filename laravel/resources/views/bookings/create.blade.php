<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book {{ $movie->title }} - {{ $cinema->name }}</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
        }

        .container {
            max-width: 700px;
            margin: 60px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px 25px;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .movie-info {
            text-align: center;
            margin-bottom: 25px;
        }

        .movie-info h2 {
            font-size: 18px;
            margin: 0;
            color: #000;
        }

        .movie-info p {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
        }

        .showtime-card {
            border: 1px solid #ccc;
            background-color: #fafafa;
            padding: 10px 15px;
            margin-bottom: 15px;
        }

        .showtime-card h3 {
            font-size: 15px;
            margin: 0 0 5px;
            color: #000;
        }

        .showtime-card p {
            font-size: 13px;
            color: #555;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            font-size: 13px;
            border: 1px solid #aaa;
            color: #000;
            background-color: #fff;
        }

        button {
            padding: 6px 12px;
            font-size: 13px;
            border: 1px solid #333;
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .no-showtimes {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 20px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #0066cc;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Book Tickets</h1>

        <div class="movie-info">
            <h2>{{ $movie->title }}</h2>
            <p>{{ $cinema->name }} – {{ $cinema->location }}</p>
        </div>

        @if($showtimes->count() > 0)
            @foreach($showtimes as $show)
                <div class="showtime-card">
                    <h3>{{ $show->show_date }} — {{ $show->show_time }}</h3>
                    <p>Available Seats: <strong>{{ $show->available_seats }}</strong></p>

                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $show->movie_id }}">
                        <input type="hidden" name="cinema_id" value="{{ $show->cinema_id }}">
                        <input type="hidden" name="show_date" value="{{ $show->show_date }}">
                        <input type="hidden" name="show_time" value="{{ $show->show_time }}">

                        <input 
                            type="number" 
                            name="seats" 
                            min="1" 
                            max="{{ $show->available_seats }}" 
                            value="1"
                            required
                        >

                        <button type="submit">Book</button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="no-showtimes">No showtimes available for this movie at {{ $cinema->name }} yet.</p>
        @endif

        <a href="{{ route('movie.cinemas', $movie->id) }}" class="back-link">← Back to Cinemas</a>
    </div>

</body>
</html>
