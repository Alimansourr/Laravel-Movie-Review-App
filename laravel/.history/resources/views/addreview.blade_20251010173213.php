<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie Review</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .star-rating {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <!-- Header with cinema theme -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Share Your Review</h1>
            <p class="text-purple-200">Tell us what you thought about the movie</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <div class="p-8">
                <form class="space-y-6" action="{{route('user.review')}}">
                    
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title" class="block text-sm font-semibold text-white mb-2">
                            Review Title
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title"
                            placeholder="e.g., A Masterpiece of Modern Cinema"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                        >
                    </div>

                    <!-- Rating Select with Stars -->
                    <div class="form-group">
                        <label for="rating" class="block text-sm font-semibold text-white mb-2">
                            Rating
                        </label>
                        <div class="relative">
                            <select 
                                id="rating" 
                                name="rating"
                                class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white appearance-none focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 cursor-pointer"
                            >
                                <option value="" class="bg-slate-800">-- Select Rating --</option>
                                <option value="1" class="bg-slate-800">⭐ 1 - Poor</option>
                                <option value="2" class="bg-slate-800">⭐⭐ 2 - Fair</option>
                                <option value="3" class="bg-slate-800">⭐⭐⭐ 3 - Good</option>
                                <option value="4" class="bg-slate-800">⭐⭐⭐⭐ 4 - Very Good</option>
                                <option value="5" class="bg-slate-800">⭐⭐⭐⭐⭐ 5 - Excellent</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-purple-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Content Textarea -->
                    <div class="form-group">
                        <label for="content" class="block text-sm font-semibold text-white mb-2">
                            Your Review
                        </label>
                        <textarea 
                            id="content" 
                            name="content"
                            rows="6"
                            placeholder="Share your thoughts about the plot, acting, cinematography, and overall experience..."
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-purple-300/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 resize-vertical"
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200 flex items-center justify-center space-x-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Submit Review</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer decoration -->
            <div class="h-2 bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600"></div>
        </div>

        <!-- Info text -->
        <p class="text-center text-purple-300/70 text-sm mt-6">
            Your review helps others discover great movies
        </p>
    </div>
</body>
</html>