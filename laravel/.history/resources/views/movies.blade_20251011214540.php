<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineReserve - Browse Movies</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
        }

        header {
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            padding: 10px 20px;
        }

        .header-content {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 30px;
            height: 30px;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon svg {
            width: 18px;
            height: 18px;
            color: white;
        }

        .brand h1 {
            font-size: 20px;
            margin: 0;
            color: #333;
        }

        nav a {
            text-decoration: none;
            color: #333;
            margin-left: 15px;
            font-size: 14px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .search-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .search-section h2 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .search-section p {
            color: #555;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .search-bar {
            display: flex;
            justify-content: center;
        }

        .search-bar input {
            width: 60%;
            padding: 8px;
            border: 1px solid #aaa;
            font-size: 14px;
            box-sizing: border-box;
        }

        .search-bar button {
            padding: 8px 15px;
            border: 1px solid #333;
            background-color: #333;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #555;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
        }

        .movie-card {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .movie-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            background-color: #eee;
        }

        .movie-info h3 {
            font-size: 16px;
            color: #000;
            margin: 10px 0 5px;
        }

        .movie-info p {
            color: #555;
            font-size: 13px;
            height: 36px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .rating-badge {
            background-color: #eee;
            color: #000;
            font-size: 13px;
            display: inline-block;
            padding: 2px 6px;
            margin-top: 5px;
            border: 1px solid #ccc;
        }

        .movie-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .movie-actions button {
            border: 1px solid #333;
            background-color: #333;
            color: white;
            padding: 6px 10px;
            font-size: 13px;
            cursor: pointer;
        }

        .movie-actions button:hover {
            background-color: #555;
        }

        .details-btn {
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
        }

        .details-btn:hover {
            background-color: #f2f2f2;
        }

        footer {
            background-color: #fff;
            border-top: 1px solid #ccc;
            text-align: center;
            padding: 10px;
            color: #555;
            font-size: 12px;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="brand">
                <div class="brand-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                        </path>
                    </svg>
                </div>
                <h1>CineReserve</h1>
            </div>
            <nav>
                <a href="{{ route('user.bookings') }}">My Bookings</a>
                <a href="{{ route('user.profile') }}">Profile</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="search-section">
            <h2>Discover Movies</h2>
            <p>Find your next favorite film</p>

            <form action="/movies/search" method="GET" class="search-bar">
                <input type="text" name="query" placeholder="Search for movies, genres, or actors...">
                <button type="submit">Search</button>
            </form>
        </div>

        <h3>Now Showing</h3>
        <div class="movies-grid">
            @foreach ($movies as $mov)
                <a href="/searching/{{$mov->id}}" style="text-decoration: none; color: inherit;">
                    <div class="movie-card">
                        <img src="/assets/{{$mov->thumbnail}}" alt="{{$mov->title}}">
                        <div class="rating-badge">
                            ★ {{ $mov->avg_rating ? number_format($mov->avg_rating, 1) : 'N/A' }}
                        </div>

                        <div class="movie-info">
                            <h3>{{$mov->title}}</h3>
                            <p>{{$mov->description}}</p>

                            <div class="movie-actions">
                                <button class="details-btn">Details</button>
                                <button>Book Now</button>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer>
        © 2024 CineReserve. All rights reserved. Your ultimate movie booking experience.
    </footer>

</body>

</html>
