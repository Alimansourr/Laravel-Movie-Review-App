<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$movie->title}} - CineReserve</title>
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
            width: 16px;
            height: 16px;
            color: white;
        }

        .brand h1 {
            font-size: 20px;
            margin: 0;
        }

        .back-btn {
            background-color: #333;
            color: white;
            border: none;
            padding: 6px 10px;
            font-size: 13px;
            cursor: pointer;
        }

        .back-btn:hover {
            background-color: #555;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .movie-container {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 15px;
        }

        .movie-poster {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background-color: #eee;
            border: 1px solid #ccc;
        }

        .movie-info {
            font-size: 14px;
            color: #333;
        }

        .movie-info h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .movie-details {
            margin-top: 10px;
        }

        .movie-details div {
            margin-bottom: 5px;
        }

        .book-btn {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .book-btn:hover {
            background-color: #555;
        }

        .rating {
            display: flex;
            align-items: center;
            margin: 10px 0;
            color: #333;
        }

        .rating svg {
            width: 18px;
            height: 18px;
            fill: #ffcc00;
        }

        .synopsis {
            margin-top: 15px;
            font-size: 14px;
            color: #333;
        }

        .stats {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .stat-box {
            flex: 1;
            border: 1px solid #ccc;
            background-color: #fafafa;
            text-align: center;
            padding: 10px;
        }

        .stat-box div:first-child {
            font-size: 20px;
            font-weight: bold;
        }

        .reviews-section {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 30px;
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .add-review-btn {
            background-color: #333;
            color: white;
            border: none;
            padding: 6px 10px;
            font-size: 13px;
            cursor: pointer;
        }

        .add-review-btn:hover {
            background-color: #555;
        }

        .review-card {
            border: 1px solid #ddd;
            background-color: #fafafa;
            padding: 10px;
            margin-bottom: 15px;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .reviewer-info {
            font-weight: bold;
        }

        .review-title {
            font-size: 13px;
            color: #555;
        }

        .review-description {
            margin-top: 8px;
            font-size: 14px;
            color: #333;
        }

        .no-reviews {
            text-align: center;
            padding: 30px 0;
            color: #555;
            font-size: 14px;
        }

        footer {
            background-color: #fff;
            border-top: 1px solid #ccc;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #555;
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
            <button onclick="redirectTomovies()" class="back-btn">← Back to Movies</button>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="movie-container">
            <!-- Movie Poster -->
            <div>
                <img src="/assets/{{$movie->thumbnail}}" alt="{{$movie->title}} Poster" class="movie-poster">

                <div class="movie-details">
                    <div><strong>Duration:</strong> {{$movie->duration}} min</div>
                    <div><strong>Genre:</strong> {{$movie->genre}}</div>
                </div>

                <a href="{{ route('movie.cinemas', $movie->id) }}" class="book-btn">Book Tickets</a>
            </div>

            <!-- Movie Details -->
            <div class="movie-info">
                <h2>{{$movie->title}}</h2>

                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if($avgRating >= $i)
                            <svg viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg viewBox="0 0 20 20" style="fill:#ccc;">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endif
                    @endfor
                    <span style="margin-left:6px;">{{ $avgRating ? number_format($avgRating, 1) : 'N/A' }}</span>
                </div>

                <div class="synopsis">
                    <h3>Synopsis</h3>
                    <p>{{$movie->synopsis}}</p>
                </div>

                <div class="stats">
                    <div class="stat-box">
                        <div>{{$movie->duration}}</div>
                        <div>Minutes</div>
                    </div>
                    <div class="stat-box">
                        <div>{{count($reviews)}}</div>
                        <div>Reviews</div>
                    </div>
                    <div class="stat-box">
                        <div>HD</div>
                        <div>Quality</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews-section">
            <div class="reviews-header">
                <h3>Reviews</h3>
                <button onclick="redirectToReview({{ $movie->id }})" class="add-review-btn">+ Add Review</button>
            </div>

            @if(count($reviews) > 0)
                @foreach ($reviews as $rev)
                    <div class="review-card">
                        <div class="review-header">
                            <div>
                                <div class="reviewer-info">{{$rev->firstname}} {{$rev->lastname}}</div>
                                <div class="review-title">{{$rev->title}}</div>
                            </div>
                            <div style="color:#ffcc00; font-weight:bold;">★ {{$rev->rating}}</div>
                        </div>
                        <div class="review-description">{{$rev->description}}</div>
                    </div>
                @endforeach
            @else
                <div class="no-reviews">No reviews yet. Be the first to share your thoughts!</div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer>
        © 2024 CineReserve. All rights reserved.
    </footer>

    <script>
        function redirectTomovies() {
            window.location.href = '/Movies';
        }

        function redirectToReview(movieId) {
            window.location.href = '/Addreview/' + movieId;
        }
    </script>
</body>

</html>
