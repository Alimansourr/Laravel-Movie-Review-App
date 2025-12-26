<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings - CineReserve</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white">
    <!-- Header -->
    <header class="border-b border-white/10 bg-black/20 backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">🎟️ My Bookings</h1>
            <a href="/Movies" class="text-purple-400 hover:text-purple-300">← Back to Movies</a>
        </div>
    </header>

    <!-- Content -->
    <main class="max-w-5xl mx-auto px-6 py-10">
        @if ($reservations->count())
            <div class="grid gap-6">
                @foreach ($reservations as $res)
                    <div class="bg-white/10 border border-white/10 rounded-2xl p-6 backdrop-blur-xl shadow-lg hover:shadow-purple-500/20 transition">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-purple-300">{{ $res->movie->title }}</h2>
                            <span class="px-3 py-1 rounded-full text-sm font-medium 
                                {{ $res->status == 'confirmed' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                {{ ucfirst($res->status) }}
                            </span>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 text-sm text-gray-300">
                            <div>
                                <p class="font-medium text-white">Cinema:</p>
                                <p>{{ $res->cinema->name }} ({{ $res->cinema->location }})</p>
                            </div>
                            <div>
                                <p class="font-medium text-white">Showtime:</p>
                                <p>{{ \Carbon\Carbon::parse($res->show_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($res->show_time)->format('H:i') }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-white">Seats Reserved:</p>
                                <p>{{ $res->seats }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="text-2xl font-semibold text-white mb-2">No Bookings Yet</h2>
                <p class="text-gray-400 mb-6">You haven’t reserved any movies yet. Explore and book your first one!</p>
                <a href="/Movies" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold px-6 py-3 rounded-lg hover:from-purple-600 hover:to-pink-600 transition">
                    Browse Movies
                </a>
            </div>
        @endif
    </main>

    <footer class="border-t border-white/10 bg-black/20 text-center py-6 text-gray-400 text-sm">
        © 2024 CineReserve. All rights reserved.
    </footer>
</body>
</html>
