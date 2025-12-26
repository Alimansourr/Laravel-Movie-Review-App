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
            background: linear-gradient(135deg, #2c2c54, #24243e);
            color: #fff;
            min-height: 100vh;
        }

        header {
            background: rgba(0, 0, 0, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 25px;
        }

        header .header-content {
            max-width: 1100px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(to right, #7b2ff7, #f107a3);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand svg {
            width: 22px;
            height: 22px;
            color: white;
        }

        .brand h1 {
            font-size: 22px;
            margin: 0;
        }

        nav a {
            color: #ccc;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.2s;
        }

        nav a:hover {
            color: white;
        }

        main {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .search-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .search-section h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .search-section p {
            color: #bbb;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar input {
            width: 60%;
            padding: 10px 12px;
            border: 1px solid #666;
            border-radius: 6px 0 0 6px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .search-bar input::placeholder {
            color: #aaa;
        }

        .search-bar button {
            padding: 10px 20px;
            border: none;
            background: #7b2ff7;
            color: white;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
            transition: 0.2s;
        }

        .search-bar button:hover {
            background: #6610f2;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .movie-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: 0.3s;
        }

        .movie-card:hover {
            border-color: #a855f7;
            transform: translateY(-4px);
        }

        .movie-poster {
            width: 100%;
            aspect-ratio: 2/3;
            background: #333;
            object-fit: cover;
        }

        .movie-info {
            padding: 15px;
        }

        .movie-info h3 {
            margin: 0 0 8px;
            font-size: 18px;
            color: white;
        }

        .movie-info p {
            color: #bbb;
            font-size: 14px;
            height: 40px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .movie-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 10px;
        }

        .movie-actions button {
            background: #7b2ff7;
            border: none;
            color: white;
            font-size: 13px;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.2s;
        }

        .movie-actions button:hover {
            background: #6610f2;
        }

        .details-btn {
            background: transparent;
            color: #ccc;
            border: none;
            cursor: pointer;
        }

        .details-btn:hover {
            color: #bb86fc;
        }

        footer {
            background: rgba(0, 0, 0, 0.4);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            padding: 15px;
            color: #aaa;
            font-size: 13px;
            margin-top: 40px;
        }

        .rating-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 12px;
            padding: 3px 8px;
            font-size: 13px;
            color: #ffd700;
        }

        .movie-card .poster-wrapper {
            position: relative;
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
        <!-- Search Section -->
        <div class="search-section">
            <h2>Discover Movies</h2>
            <p>Find your next favorite film</p>

            <form action="/movies/search" method="GET" class="search-bar">
                <input type="text" name="query" placeholder="Search for movies, genres, or actors...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Movies Grid -->
        <h3 style="font-size: 22px; margin-bottom: 20px;">Now Showing</h3>
        <div class="movies-grid">
            @foreach ($movies as $mov)
                <a href="/searching/{{$mov->id}}" style="text-decoration: none; color: inherit;">
                    <div class="movie-card">
                        <div class="poster-wrapper">
                            <img src="/assets/{{$mov->thumbnail}}" alt="{{$mov->title}}" class="movie-poster">
                            <div class="rating-badge">
                                ★ {{ $mov->avg_rating ? number_format($mov->avg_rating, 1) : 'N/A' }}
                            </div>
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
