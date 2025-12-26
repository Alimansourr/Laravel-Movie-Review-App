<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings - CineReserve</title>
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

        header .header-content {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        header a {
            color: #0066cc;
            text-decoration: none;
            font-size: 14px;
        }

        header a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .booking-card {
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .booking-title {
            font-size: 16px;
            font-weight: bold;
        }

        .status {
            font-size: 13px;
            padding: 3px 8px;
            border: 1px solid #ccc;
        }

        .status.confirmed {
            background-color: #dff0d8;
            border-color: #c8e5bc;
            color: #3c763d;
        }

        .status.cancelled {
            background-color: #f2dede;
            border-color: #ebcccc;
            color: #a94442;
        }

        .booking-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 10px;
            font-size: 14px;
            color: #333;
        }

        .booking-details p {
            margin: 3px 0;
        }

        .no-bookings {
            text-align: center;
            padding: 60px 20px;
        }

        .no-bookings h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .no-bookings p {
            color: #555;
            margin-bottom: 15px;
        }

        .browse-btn {
            background-color: #333;
            color: white;
            border: none;
            padding: 8px 14px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .browse-btn:hover {
            background-color: #555;
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
            <h1>🎟️ My Bookings</h1>
            <a href="/Movies">← Back to Movies</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @if ($reservations->count())
            @foreach ($reservations as $res)
                <div class="booking-card">
                    <div class="booking-header">
                        <div class="booking-title">{{ $res->movie->title }}</div>
                        <span class="status {{ $res->status == 'confirmed' ? 'confirmed' : 'cancelled' }}">
                            {{ ucfirst($res->status) }}
                        </span>
                    </div>

                    <div class="booking-details">
                        <div>
                            <p><strong>Cinema:</strong></p>
                            <p>{{ $res->cinema->name }} ({{ $res->cinema->location }})</p>
                        </div>
                        <div>
                            <p><strong>Showtime:</strong></p>
                            <p>{{ \Carbon\Carbon::parse($res->show_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($res->show_time)->format('H:i') }}</p>
                        </div>
                        <div>
                            <p><strong>Seats Reserved:</strong></p>
                            <p>{{ $res->seats }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-bookings">
                <h2>No Bookings Yet</h2>
                <p>You haven’t reserved any movies yet. Explore and book your first one!</p>
                <a href="/Movies" class="browse-btn">Browse Movies</a>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer>
        © 2024 CineReserve. All rights reserved.
    </footer>

</body>
</html>
