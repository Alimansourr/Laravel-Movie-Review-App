<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Cinema - {{ $movie->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 to-purple-900 text-white flex items-center justify-center">
    <div class="max-w-3xl w-full bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl p-10 border border-white/10">
        <h1 class="text-3xl font-bold mb-6">Select a Cinema for "{{ $movie->title }}"</h1>

        @if($movie->cinemas->count())
            <div class="grid gap-4">
                @foreach($movie->cinemas as $cinema)
                    <div class="flex items-center justify-between bg-white/10 p-4 rounded-lg hover:bg-purple-500/30 transition">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $cinema->name }}</h2>
                            <p class="text-gray-300">{{ $cinema->location }}</p>
                        </div>
                        <a href="{{ route('reservation.create', ['movie' => $movie->id, 'cinema' => $cinema->id]) }}"
                           class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-medium px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-600 transition">
                           Continue
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-400 text-lg">No cinemas currently offering this movie.</p>
        @endif

        <div class="mt-6 text-center">
            <a href="/Movies" class="text-purple-400 hover:text-purple-300">← Back to Movies</a>
        </div>
    </div>
</body>
</html>
