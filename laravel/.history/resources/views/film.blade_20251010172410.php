<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$movie->title}} - CineReserve</title>
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
                <button onclick="redirectTomovies()" class="flex items-center space-x-2 text-gray-300 hover:text-white transition duration-200 group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="font-medium">Back to Movies</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Movie Hero Section -->
        <div class="bg-white/5 backdrop-blur-xl rounded-3xl overflow-hidden border border-white/20 shadow-2xl mb-12">
            <div class="grid md:grid-cols-5 gap-8 p-8">
                
                <!-- Movie Poster -->
                <div class="md:col-span-2">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-500/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        <img 
                            src="/assets/{{$movie->thumbnail}}" 
                            alt="{{$movie->title}} Poster"
                            class="w-full rounded-2xl shadow-2xl shadow-black/50"
                        >
                    </div>
                    
                    <!-- Movie Info Card -->
                    <div class="mt-6 bg-white/5 backdrop-blur-xl rounded-2xl p-6 border border-white/10">
                        <h3 class="text-white font-semibold mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Movie Info
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400 text-sm">Duration</span>
                                <span class="text-white font-medium">{{$movie->duration}} min</span>
                            </div>
                            <div class="h-px bg-white/10"></div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400 text-sm">Genre</span>
                                <span class="text-purple-400 font-medium">{{$movie->genre}}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 space-y-3">
                        <button class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-4 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/50 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Book Tickets</span>
                        </button>
                        <button class="w-full bg-white/10 backdrop-blur-xl border border-white/20 text-white font-semibold py-4 rounded-xl hover:bg-white/20 transition duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <span>Add to Wishlist</span>
                        </button>
                    </div>
                </div>

                <!-- Movie Details -->
                <div class="md:col-span-3">
                    <div class="space-y-6">
                        <!-- Title and Rating -->
                        <div>
                            <h1 class="text-4xl font-bold text-white mb-4">{{$movie->title}}</h1>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center bg-yellow-500/20 px-4 py-2 rounded-full">
                                    <svg class="w-5 h-5 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="text-yellow-400 font-bold text-lg">4.5</span>
                                    <span class="text-gray-400 text-sm ml-2">/ 5.0</span>
                                </div>
                                <span class="text-gray-400">•</span>
                                <span class="text-gray-300">{{count($reviews)}} Reviews</span>
                            </div>
                        </div>

                        <!-- Synopsis -->
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-4 flex items-center">
                                <div class="w-1 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full mr-3"></div>
                                Synopsis
                            </h2>
                            <p class="text-gray-300 text-lg leading-relaxed">
                                {{$movie->synopsis}}
                            </p>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-4 pt-6">
                            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10 text-center">
                                <div class="text-3xl font-bold text-purple-400 mb-1">{{$movie->duration}}</div>
                                <div class="text-gray-400 text-sm">Minutes</div>
                            </div>
                            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10 text-center">
                                <div class="text-3xl font-bold text-pink-400 mb-1">{{count($reviews)}}</div>
                                <div class="text-gray-400 text-sm">Reviews</div>
                            </div>
                            <div class="bg-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/10 text-center">
                                <div class="text-3xl font-bold text-blue-400 mb-1">HD</div>
                                <div class="text-gray-400 text-sm">Quality</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/20 p-8 shadow-2xl">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-white flex items-center">
                    <div class="w-1 h-10 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full mr-4"></div>
                    Reviews
                </h2>
                <button onclick="redirectToReview()" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold px-6 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/50 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Add Review</span>
                </button>
            </div>

            @if(count($reviews) > 0)
                <div class="space-y-6">
                    @foreach ($reviews as $rev)
                    <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:border-purple-500/30 transition duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <!-- User Avatar -->
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{substr($rev->firstname, 0, 1)}}{{substr($rev->lastname, 0, 1)}}
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold text-lg">{{$rev->firstname}} {{$rev->lastname}}</h4>
                                    <p class="text-gray-400 text-sm">{{$rev->title}}</p>
                                </div>
                            </div>
                            <!-- Rating -->
                            <div class="flex items-center bg-yellow-500/20 px-3 py-1.5 rounded-full">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="text-yellow-400 font-bold">{{$rev->rating}}</span>
                            </div>
                        </div>
                        <p class="text-gray-300 leading-relaxed">{{$rev->description}}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <p class="text-gray-400 text-lg">No reviews yet. Be the first to share your thoughts!</p>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative border-t border-white/10 bg-black/20 backdrop-blur-lg mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <p class="text-center text-gray-400 text-sm">
                © 2024 CineReserve. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        function redirectTomovies() {
            window.location.href = '/Movies';
        }
        
        function redirectToReview() {
            window.location.href = '/Addreview';
        }
    </script>

</body>
</html>