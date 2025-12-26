<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - CineReserve</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px 25px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        a.back-link {
            color: #0066cc;
            text-decoration: none;
            font-size: 14px;
        }

        a.back-link:hover {
            text-decoration: underline;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .profile-card {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            border: 1px solid #ccc;
            background-color: #fafafa;
            padding: 20px;
        }

        .avatar {
            width: 120px;
            height: 120px;
            background-color: #333;
            color: white;
            font-size: 36px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-info {
            flex: 1;
        }

        .user-info h2 {
            margin: 0;
            font-size: 18px;
        }

        .user-info p {
            margin: 5px 0 15px;
            color: #555;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 10px;
        }

        .info-box {
            border: 1px solid #ccc;
            background-color: #fff;
            text-align: center;
            padding: 10px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            border-top: 1px solid #ccc;
            margin-top: 20px;
        }

        .stat-box {
            padding: 15px;
            text-align: center;
        }

        .stat-box h4 {
            font-size: 18px;
            margin: 0;
        }

        .stat-box p {
            font-size: 13px;
            color: #555;
        }

        .edit-button {
            display: block;
            margin: 20px 0 10px auto;
            padding: 8px 14px;
            border: 1px solid #333;
            background-color: #333;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #555;
        }

        /* Edit Form Section */
        .edit-section {
            border: 1px solid #ccc;
            background-color: #fafafa;
            padding: 20px;
            margin-top: 20px;
            display: none;
        }

        .edit-section h3 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        input[type="text"],
        input[type="number"],
        input[type="password"],
        select {
            width: 100%;
            padding: 7px;
            font-size: 13px;
            border: 1px solid #aaa;
            background-color: #fff;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .cancel-btn {
            background: none;
            border: none;
            color: #555;
            cursor: pointer;
            font-size: 13px;
        }

        .cancel-btn:hover {
            text-decoration: underline;
        }

        .save-btn {
            border: 1px solid #333;
            background-color: #333;
            color: white;
            padding: 7px 12px;
            cursor: pointer;
            font-size: 13px;
        }

        .save-btn:hover {
            background-color: #555;
        }

        footer {
            background-color: #fff;
            border-top: 1px solid #ccc;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #555;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="profile-header">
            <h1>My Profile</h1>
            <a href="/Movies" class="back-link">← Back to Movies</a>
        </div>

        <div class="profile-card">
            <div class="avatar">
                {{ strtoupper(substr($user->firstname, 0, 1)) }}{{ strtoupper(substr($user->lastname, 0, 1)) }}
            </div>

            <div class="user-info">
                <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
                <p>{{ $user->email }}</p>

                <div class="info-grid">
                    <div class="info-box">
                        <p><strong>Gender</strong></p>
                        <p>{{ $user->gender }}</p>
                    </div>
                    <div class="info-box">
                        <p><strong>Age</strong></p>
                        <p>{{ $user->age ?? '—' }}</p>
                    </div>
                    <div class="info-box">
                        <p><strong>Member Since</strong></p>
                        <p>{{ \Carbon\Carbon::parse($user->created_at)->format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats">
            <div class="stat-box">
                <h4>{{ $user->reservations->count() ?? 0 }}</h4>
                <p>Total Bookings</p>
            </div>
            <div class="stat-box">
                <h4>{{ $user->userReviews()->count() ?? 0 }}</h4>
                <p>Reviews Written</p>
            </div>
            <div class="stat-box">
                <h4>5.0</h4>
                <p>Average Rating Given</p>
            </div>
        </div>

        <button id="editBtn" class="edit-button">Edit Profile</button>

        <!-- Edit Form -->
        <div id="editSection" class="edit-section">
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                <h3>Edit Your Profile</h3>

                <div class="form-grid">
                    <div>
                        <label>First Name</label>
                        <input type="text" name="firstname" value="{{ $user->firstname }}">
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input type="text" name="lastname" value="{{ $user->lastname }}">
                    </div>
                </div>

                <div class="form-grid">
                    <div>
                        <label>Gender</label>
                        <select name="gender">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div>
                        <label>Age</label>
                        <input type="number" name="age" value="{{ $user->age }}">
                    </div>
                </div>

                <div>
                    <label>New Password (optional)</label>
                    <input type="password" name="password" placeholder="Enter new password...">
                </div>

                <div class="form-buttons">
                    <button type="button" id="cancelEdit" class="cancel-btn">Cancel</button>
                    <button type="submit" class="save-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        © 2024 CineReserve. All rights reserved.
    </footer>

    <script>
        const editBtn = document.getElementById('editBtn');
        const editSection = document.getElementById('editSection');
        const cancelBtn = document.getElementById('cancelEdit');

        editBtn.addEventListener('click', () => {
            editSection.style.display = editSection.style.display === 'none' || editSection.style.display === '' ? 'block' : 'none';
        });

        cancelBtn?.addEventListener('click', () => {
            editSection.style.display = 'none';
        });
    </script>

</body>
</html>
