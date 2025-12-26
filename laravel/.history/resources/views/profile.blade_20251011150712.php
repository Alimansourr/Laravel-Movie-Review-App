<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - CineReserve</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white relative">

    <!-- Decorative blobs -->
    <div class="absolute top-10 left-10 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl"></div>

    <!-- Page Container -->
    <div class="max-w-4xl mx-auto py-20 px-6 relative z-10">

        <!-- Header -->
        <div class="flex items-center justify-between mb-12">
            <h1 class="text-4xl font-bold text-white tracking-tight">My Profile</h1>
            <a href="/Movies" class="text-purple-400 hover:text-purple-300 text-sm font-medium transition">
                ← Back to Movies
            </a>
        </div>

        <!-- Profile Card -->
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
            <div class="flex flex-col md:flex-row items-center p-8 space-y-8 md:space-y-0 md:space-x-10">
                
                <!-- Avatar -->
                <div class="relative">
                    <div class="w-36 h-36 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-4xl font-bold text-white shadow-lg shadow-purple-500/40">
                        {{ strtoupper(substr($user->firstname, 0, 1)) }}{{ strtoupper(substr($user->lastname, 0, 1)) }}
                    </div>
                    <div class="absolute bottom-2 right-2 bg-purple-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm border border-white/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6 3.536 3.536L9 17.536V11z"></path>
                        </svg>
                    </div>
                </div>

                <!-- User Info -->
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold mb-2">{{ $user->firstname }} {{ $user->lastname }}</h2>
                    <p class="text-gray-400 mb-4">{{ $user->email }}</p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm">
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10 text-center">
                            <p class="text-gray-400">Gender</p>
                            <p class="text-white font-semibold mt-1 capitalize">{{ $user->gender }}</p>
                        </div>
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10 text-center">
                            <p class="text-gray-400">Age</p>
                            <p class="text-white font-semibold mt-1">{{ $user->age ?? '—' }}</p>
                        </div>
                        <div class="bg-white/5 rounded-xl p-4 border border-white/10 text-center">
                            <p class="text-gray-400">Member Since</p>
                            <p class="text-white font-semibold mt-1">{{ \Carbon\Carbon::parse($user->created_at)->format('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-white/10"></div>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-white/10 text-center">
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-purple-400 mb-1">{{ $user->reservations->count() ?? 0 }}</h4>
                    <p class="text-gray-400 text-sm">Total Bookings</p>
                </div>
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-pink-400 mb-1">{{ $user->userReviews()->count() ?? 0 }}

</h4>
                    <p class="text-gray-400 text-sm">Reviews Written</p>
                </div>
                <div class="p-6">
                    <h4 class="text-2xl font-bold text-blue-400 mb-1">5.0</h4>
                    <p class="text-gray-400 text-sm">Average Rating Given</p>
                </div>
            </div>
        </div>

        <!-- Edit Button -->
        <div class="flex justify-end mt-8">
            <button id="editBtn"
                class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold px-6 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/30">
                Edit Profile
            </button>
        </div>

        <!-- Hidden Edit Form (Modal-like) -->
        <div id="editSection" class="hidden mt-10">
            <form action="{{ route('user.profile.update') }}" method="POST"
                class="bg-white/10 p-8 rounded-2xl border border-white/20 backdrop-blur-xl">
                @csrf
                <h3 class="text-2xl font-bold mb-6 text-white">Edit Your Profile</h3>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm">First Name</label>
                        <input type="text" name="firstname" value="{{ $user->firstname }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white">
                    </div>
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm">Last Name</label>
                        <input type="text" name="lastname" value="{{ $user->lastname }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm">Gender</label>
                        <select name="gender"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-400 mb-2 text-sm">Age</label>
                        <input type="number" name="age" value="{{ $user->age }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-gray-400 mb-2 text-sm">New Password (optional)</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white"
                        placeholder="Enter new password...">
                </div>

                <div class="flex justify-between items-center mt-8">
                    <button type="button" id="cancelEdit"
                        class="text-gray-400 hover:text-white transition">Cancel</button>
                    <button type="submit"
                        class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold px-8 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/30">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const editBtn = document.getElementById('editBtn');
        const editSection = document.getElementById('editSection');
        const cancelBtn = document.getElementById('cancelEdit');

        editBtn.addEventListener('click', () => editSection.classList.toggle('hidden'));
        cancelBtn?.addEventListener('click', () => editSection.classList.add('hidden'));
    </script>
</body>
</html>
