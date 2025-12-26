<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">

    <!-- Top Navigation Bar -->
    <nav class="bg-black/40 backdrop-blur-lg border-b border-white/10 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo & Title -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white">Admin Dashboard</span>
                </a>
                
                <!-- Back Button -->
                <a href="/" class="flex items-center space-x-2 bg-white/10 hover:bg-white/20 text-white px-5 py-2.5 rounded-lg font-medium border border-white/20 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Dashboard</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-10 max-w-4xl">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Update Movie</h1>
            <p class="text-purple-200">Edit the movie details below</p>
        </div>

        <!-- Movie Form Card -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Two Column Layout for Title and Year -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-white mb-2">
                                Movie Title *
                            </label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                value="{{ $movie->title }}"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200" 
                                required>
                        </div>
                        
                        <!-- Production Year -->
                        <div>
                            <label for="production_year" class="block text-sm font-semibold text-white mb-2">
                                Production Year *
                            </label>
                            <input 
                                type="number" 
                                id="production_year" 
                                name="production_year" 
                                value="{{ $movie->production_year }}"
                                min="1900"
                                max="2100"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200" 
                                required>
                        </div>
                    </div>

                    <!-- Current Thumbnail Preview & Upload -->
                    <div>
                        <label for="thumbnail" class="block text-sm font-semibold text-white mb-2">
                            Movie Thumbnail
                        </label>
                        
                        <!-- Current Thumbnail Preview -->
                        <div class="mb-3 p-4 bg-white/5 border border-white/20 rounded-lg">
                            <p class="text-purple-300 text-sm mb-2">Current thumbnail:</p>
                            <div class="flex items-center space-x-4">
                                <img src="/assets/{{ $movie->thumbnail }}" 
                                     alt="{{ $movie->title }}" 
                                     class="w-24 h-36 object-cover rounded-lg border-2 border-purple-500/50">
                                <div class="flex-1">
                                    <p class="text-white font-medium">{{ $movie->thumbnail }}</p>
                                    <p class="text-purple-300/70 text-xs mt-1">Leave empty to keep current thumbnail</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- New Thumbnail Upload -->
                        <input 
                            type="file" 
                            id="thumbnail" 
                            name="thumbnail" 
                            accept="image/*"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-emerald-600 file:text-white file:font-medium hover:file:bg-emerald-700 file:cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 transition duration-200">
                        <p class="text-purple-300/70 text-xs mt-2">Upload a new image only if you want to replace the current one</p>
                    </div>

                    <!-- Two Column Layout for Duration and Genre -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Duration -->
                        <div>
                            <label for="duration" class="block text-sm font-semibold text-white mb-2">
                                Duration (minutes) *
                            </label>
                            <div class="relative">
                                <input 
                                    type="number" 
                                    id="duration" 
                                    name="duration" 
                                    value="{{ $movie->duration }}"
                                    min="1"
                                    class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200" 
                                    required>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Genre -->
                        <div>
                            <label for="genre" class="block text-sm font-semibold text-white mb-2">
                                Genre *
                            </label>
                            <input 
                                type="text" 
                                id="genre" 
                                name="genre" 
                                value="{{ $movie->genre }}"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200" 
                                required>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-white mb-2">
                            Short Description *
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="3"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 resize-vertical" 
                            required>{{ $movie->description }}</textarea>
                    </div>
                    
                    <!-- Synopsis -->
                    <div>
                        <label for="synopsis" class="block text-sm font-semibold text-white mb-2">
                            Full Synopsis *
                        </label>
                        <textarea 
                            id="synopsis" 
                            name="synopsis" 
                            rows="5"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 resize-vertical" 
                            required>{{ $movie->synopsis }}</textarea>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-white/10 pt-6">
                        <!-- Submit Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button 
                                type="submit" 
                                class="flex-1 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Update Movie</span>
                            </button>
                            <a 
                                href="/" 
                                class="sm:w-auto bg-white/10 hover:bg-white/20 text-white font-medium py-3 px-6 rounded-lg border border-white/20 transition duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer decoration with green theme -->
            <div class="h-2 bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-600"></div>
        </div>

        <!-- Help Text -->
        <p class="text-center text-purple-300/70 text-sm mt-6">
            * Required fields • Changes will be saved immediately
        </p>
    </div>

</body>
</html>