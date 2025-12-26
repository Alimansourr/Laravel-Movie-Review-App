<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
        }

        nav {
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            padding: 10px 20px;
        }

        nav .nav-content {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-title {
            font-weight: bold;
            font-size: 20px;
        }

        .back-btn {
            text-decoration: none;
            background-color: #ddd;
            color: #000;
            padding: 6px 12px;
            font-size: 13px;
            border: 1px solid #aaa;
        }

        .back-btn:hover {
            background-color: #ccc;
        }

        main {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 25px;
        }

        h1 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 10px;
        }

        p.subtitle {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 13px;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            font-size: 13px;
            border: 1px solid #aaa;
            background-color: #fff;
            color: #000;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row > div {
            flex: 1;
        }

        .thumbnail-preview {
            border: 1px solid #ccc;
            background-color: #fafafa;
            padding: 10px;
        }

        .thumbnail-preview img {
            width: 80px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #aaa;
            margin-right: 10px;
        }

        .thumbnail-info {
            font-size: 13px;
            color: #555;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button,
        .cancel-link {
            flex: 1;
            font-size: 13px;
            padding: 8px;
            text-align: center;
            cursor: pointer;
            border: none;
            color: white;
        }

        button {
            background-color: #2e8b57;
        }

        button:hover {
            background-color: #256f47;
        }

        .cancel-link {
            background-color: #777;
            text-decoration: none;
        }

        .cancel-link:hover {
            background-color: #555;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-top: 40px;
            border-top: 1px solid #ccc;
            background-color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav>
        <div class="nav-content">
            <div class="nav-title">Admin Dashboard</div>
            <a href="/" class="back-btn">← Back to Dashboard</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <h1>Update Movie</h1>
        <p class="subtitle">Edit the movie details below</p>

        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div>
                    <label for="title">Movie Title *</label>
                    <input type="text" id="title" name="title" value="{{ $movie->title }}" required>
                </div>

                <div>
                    <label for="production_year">Production Year *</label>
                    <input type="number" id="production_year" name="production_year" value="{{ $movie->production_year }}" min="1900" max="2100" required>
                </div>
            </div>

            <div>
                <label for="thumbnail">Movie Thumbnail *</label>
                <div class="thumbnail-preview">
                    <p class="thumbnail-info"><strong>Current thumbnail:</strong></p>
                    <div style="display: flex; align-items: center;">
                        <img src="/assets/{{ $movie->thumbnail }}" alt="{{ $movie->title }}">
                        <div class="thumbnail-info">
                            <p>{{ $movie->thumbnail }}</p>
                            <p style="font-size: 12px;">Upload a new thumbnail to replace this one</p>
                        </div>
                    </div>
                </div>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>
            </div>

            <div class="form-row">
                <div>
                    <label for="duration">Duration (minutes) *</label>
                    <input type="number" id="duration" name="duration" value="{{ $movie->duration }}" min="1" required>
                </div>

                <div>
                    <label for="genre">Genre *</label>
                    <input type="text" id="genre" name="genre" value="{{ $movie->genre }}" required>
                </div>
            </div>

            <div>
                <label for="description">Short Description *</label>
                <textarea id="description" name="description" rows="3" required>{{ $movie->description }}</textarea>
            </div>

            <div>
                <label for="synopsis">Full Synopsis *</label>
                <textarea id="synopsis" name="synopsis" rows="5" required>{{ $movie->synopsis }}</textarea>
            </div>

            <div class="buttons">
                <button type="submit">Update Movie</button>
                <a href="/" class="cancel-link">Cancel</a>
            </div>
        </form>
    </main>

    <footer>
        © 2024 CineReserve. All rights reserved.
    </footer>

</body>
</html>
