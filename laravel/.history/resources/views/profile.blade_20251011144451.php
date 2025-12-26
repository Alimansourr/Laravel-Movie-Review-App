<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - CineReserve</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen text-white">

    <div class="max-w-3xl mx-auto py-16 px-6">
        <h1 class="text-4xl font-bold text-center mb-10">My Profile</h1>

        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-2 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.profile.update') }}" method="POST" class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-8">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 mb-2">First Name</label>
                    <input type="text" name="firstname" value="{{ $user->firstname }}" class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white focus:ring-2 focus:ring-purple-500 outline-none">
                </div>
                <div>
                    <label class="block text-gray-300 mb-2">Last Name</label>
                    <input type="text" name="lastname" value="{{ $user->lastname }}" class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white focus:ring-2 focus:ring-purple-500 outline-none">
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-300 mb-2">Email (read-only)</label>
                <input type="text" value="{{ $user->email }}" readonly class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-gray-400 cursor-not-allowed">
            </div>

            <div class="grid grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-gray-300 mb-2">Age</label>
                    <input type="number" name="age" value="{{ $user->age }}" class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white focus:ring-2 focus:ring-purple-500 outline-none">
                </div>
                <div>
                    <label class="block text-gray-300 mb-2">Gender</label>
                    <select name="gender" class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white focus:ring-2 focus:ring-purple-500 outline-none">
                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-300 mb-2">Password (leave blank to keep current)</label>
                <input type="password" name="password" placeholder="Enter new password..." class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white focus:ring-2 focus:ring-purple-500 outline-none">
            </div>

            <div class="flex justify-between items-center mt-10">
                <a href="/Movies" class="text-purple-400 hover:text-purple-300 transition">← Back to Movies</a>
                <button type="submit" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold px-8 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition duration-200 shadow-lg shadow-purple-500/30">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</body>
</html>
