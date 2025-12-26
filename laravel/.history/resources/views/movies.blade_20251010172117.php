<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineReserve - Browse Movies</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse delay-1000"></div>
    </div>

    <!-- Header -->
    <header class="relative border-b border-white/10 bg-black/20 backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/50">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">CineReserve</h1>
                </div>
                <nav class="flex items-center space-x-6">
                    <a href="#" class="text-gray-300 hover:text-white transition duration-200">My Bookings</a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-200">Profile</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Search Section -->
        <div class="mb-12">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-white mb-3">Discover Movies</h2>
                <p class="text-gray-400 text-lg">Find your next favorite film</p>
            </div>
            
            <form action="/movies/search" method="GET" class="max-w-2xl mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="query" 
                        placeholder="Search for movies, genres, or actors..." 
                        class="w-full pl-12 pr-32 py-4 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                    >
                    <button 
                        type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold px-8 py-2.5 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/50"
                    >
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Movies Grid -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-white">Now Showing</h3>
                <div class="flex items-center space-x-3">
                    <button class="text-gray-400 hover:text-white transition duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <button class="text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Movie Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($movies as $mov)
                <a href="/searching/{{$mov->id}}" class="group">
                    <div class="bg-white/5 backdrop-blur-xl rounded-2xl overflow-hidden border border-white/10 hover:border-purple-500/50 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/20 hover:-translate-y-2">
                        <!-- Movie Poster -->
                        <div class="relative aspect-[2/3] overflow-hidden bg-slate-800">
                            <img 
                                src="/assets/{{$mov->thumbnail}}" 
                                alt="{{$mov->title}}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                            
                            <!-- Play button overlay -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center shadow-2xl transform scale-75 group-hover:scale-100 transition duration-300">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Rating badge -->
                            <div class="absolute top-4 right-4 bg-black/70 backdrop-blur-sm px-3 py-1.5 rounded-full">
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="text-white text-sm font-semibold">4.5</span>
                                </div>
                            </div>
                        </div>

                        <!-- Movie Info -->
                        <div class="p-5">
                            <h3 class="text-white font-bold text-lg mb-2 group-hover:text-purple-400 transition duration-200 line-clamp-1">
                                {{$mov->title}}
                            </h3>
                            <p class="text-gray-400 text-sm line-clamp-2 mb-4">
                                {{$mov->description}}
                            </p>
                            
                            <!-- Action buttons -->
                            <div class="flex items-center justify-between pt-4 border-t border-white/10">
                                <button class="flex items-center space-x-2 text-gray-400 hover:text-purple-400 transition duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium">Details</span>
                                </button>
                                <button class="bg-gradient-to-r from-purple-500 to-pink-500 text-white text-sm font-semibold px-5 py-2 rounded-lg hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/30">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

       
    </main>

    <!-- Footer -->
    <footer class="relative border-t border-white/10 bg-black/20 backdrop-blur-lg mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <p class="text-center text-gray-400 text-sm">
                © 2024 CineReserve. All rights reserved. Your ultimate movie booking experience.
            </p>
        </div>
    </footer>

</body>
</html>