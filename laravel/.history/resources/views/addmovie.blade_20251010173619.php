<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie</title>
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
                <a href="index.html" class="flex items-center space-x-3 group">
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
            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Add New Movie</h1>
            <p class="text-purple-200">Fill in the details to add a movie to your collection</p>
        </div>

        <!-- Movie Form Card -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <div class="p-8">
                <form action="{{route('movie.add')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
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
                                placeholder="e.g., The Shawshank Redemption"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
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
                                placeholder="e.g., 2024"
                                min="1900"
                                max="2100"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                                required>
                        </div>
                    </div>

                    <!-- Thumbnail Upload -->
                    <div>
                        <label for="thumbnail" class="block text-sm font-semibold text-white mb-2">
                            Movie Thumbnail *
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="thumbnail" 
                                name="thumbnail" 
                                accept="image/*"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-600 file:text-white file:font-medium hover:file:bg-purple-700 file:cursor-pointer focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-200" 
                                required>
                        </div>
                        <p class="text-purple-300/70 text-xs mt-2">Recommended: 300x450px (2:3 ratio), max 5MB</p>
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
                                    placeholder="e.g., 142"
                                    min="1"
                                    class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
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
                                placeholder="e.g., Drama, Thriller"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
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
                            placeholder="A brief overview of the movie (1-2 sentences)"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 resize-vertical" 
                            required></textarea>
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
                            placeholder="Detailed plot summary and storyline..."
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 resize-vertical" 
                            required></textarea>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-white/10 pt-6">
                        <!-- Submit Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button 
                                type="submit" 
                                class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Add Movie to Collection</span>
                            </button>
                            <button 
                                type="reset" 
                                class="sm:w-auto bg-white/10 hover:bg-white/20 text-white font-medium py-3 px-6 rounded-lg border border-white/20 transition duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span>Reset Form</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer decoration -->
            <div class="h-2 bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600"></div>
        </div>

        <!-- Help Text -->
        <p class="text-center text-purple-300/70 text-sm mt-6">
            * Required fields • All information can be edited later
        </p>
    </div>

</body>
</html>