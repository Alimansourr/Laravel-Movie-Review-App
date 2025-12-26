<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book {{ $movie->title }} - {{ $cinema->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white flex flex-col items-center justify-center py-10">
    <div class="max-w-3xl w-full bg-white/10 backdrop-blur-xl rounded-2xl p-10 shadow-2xl border border-white/10">
        <h1 class="text-3xl font-bold mb-6 text-center">Book Tickets</h1>

        <div class="text-center mb-8">
            <h2 class="text-2xl font-semibold">{{ $movie->title }}</h2>
            <p class="text-gray-300">{{ $cinema->name }} – {{ $cinema->location }}</p>
        </div>

        @if($showtimes->count() > 0)
            @foreach($showtimes as $show)
                <div class="bg-white/10 rounded-xl p-6 mb-4 border border-white/20 shadow-md">
                    <h3 class="text-white font-semibold text-lg">
                        {{ $show->show_date }} — {{ $show->show_time }}
                    </h3>
                    <p class="text-gray-400 mb-3">Available Seats: 
                        <span class="text-purple-400 font-semibold">{{ $show->available_seats }}</span>
                    </p>

                    <form action="{{ route('reservation.store') }}" method="POST" class="flex items-center space-x-3">
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
                            class="w-24 p-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none"
                            required
                        >

                        <button type="submit" 
                            class="bg-gradient-to-r from-purple-500 to-pink-500 px-5 py-2 rounded-lg font-semibold hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg">
                            Book
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-400">No showtimes available for this movie at {{ $cinema->name }} yet.</p>
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('movie.cinemas', $movie->id) }}" class="text-purple-400 hover:text-purple-300">
                ← Back to Cinemas
            </a>
        </div>
    </div>
</body>
</html>
