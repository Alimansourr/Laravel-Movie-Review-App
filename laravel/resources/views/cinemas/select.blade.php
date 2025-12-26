<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Cinema - {{ $movie->title }}</title>
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
            font-size: 22px;
            margin-bottom: 20px;
            text-align: center;
        }

        .cinema-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .cinema-card {
            border: 1px solid #ccc;
            background-color: #fafafa;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cinema-info h2 {
            font-size: 16px;
            margin: 0 0 5px;
            color: #000;
        }

        .cinema-info p {
            font-size: 13px;
            color: #555;
            margin: 0;
        }

        .view-btn {
            background-color: #333;
            color: white;
            border: none;
            padding: 7px 12px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .view-btn:hover {
            background-color: #555;
        }

        .no-cinemas {
            text-align: center;
            color: #555;
            margin-top: 20px;
            font-size: 14px;
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
        <h1>Select a Cinema for "{{ $movie->title }}"</h1>

        @if($cinemas->count() > 0)
            <div class="cinema-list">
                @foreach($cinemas as $cinema)
                    <div class="cinema-card">
                        <div class="cinema-info">
                            <h2>{{ $cinema->name }}</h2>
                            <p>{{ $cinema->location }}</p>
                        </div>
                        <a href="{{ route('reservation.create', ['movie' => $movie->id, 'cinema' => $cinema->id]) }}" class="view-btn">
                            View Showtimes
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-cinemas">No cinemas are currently showing this movie.</p>
        @endif

        <a href="/Movies" class="back-link">← Back to Movies</a>
    </div>

</body>
</html>
