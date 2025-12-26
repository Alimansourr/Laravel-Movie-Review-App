<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book {{ $movie->title }} - {{ $cinema->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white flex items-center justify-center">
    <div class="max-w-lg w-full bg-white/10 backdrop-blur-xl rounded-2xl p-10 shadow-2xl border border-white/10">
        <h1 class="text-3xl font-bold mb-6">Book Tickets</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">{{ $movie->title }}</h2>
            <p class="text-gray-300">{{ $cinema->name }} – {{ $cinema->location }}</p>
        </div>

        <form action="{{ route('reservation.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <input type="hidden" name="cinema_id" value="{{ $cinema->id }}">

            <div>
                <label class="block mb-2 text-sm text-gray-300">Show Date</label>
                <input type="date" name="show_date" class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white" required>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-300">Show Time</label>
                <input type="time" name="show_time" class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white" required>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-300">Seats</label>
                <input type="number" name="seats" min="1" max="10" value="1" class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white" required>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg">
                Confirm Reservation
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('movie.cinemas', $movie->id) }}" class="text-purple-400 hover:text-purple-300">← Back to Cinemas</a>
        </div>
    </div>
</body>
</html>
