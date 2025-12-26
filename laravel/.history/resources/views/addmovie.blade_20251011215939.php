<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie</title>
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

        .nav-content {
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

        main {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 25px;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 10px;
        }

        p.subtitle {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 13px;
            color: #333;
            margin-bottom: 5px;
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

        .hint {
            font-size: 12px;
            color: #555;
        }

        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #555;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #555;
            padding: 10px;
            border-top: 1px solid #ccc;
            background-color: #fff;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav>
        <div class="nav-content">
            <div class="nav-title">Admin Dashboard</div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <h1>Add New Movie</h1>
        <p class="subtitle">Fill in the details to add a movie to your collection</p>

        <form action="{{ route('movie.add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div>
                    <label for="title">Movie Title *</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        placeholder="e.g., The Shawshank Redemption"
                        required>
                </div>

                <div>
                    <label for="production_year">Production Year *</label>
                    <input 
                        type="number" 
                        id="production_year" 
                        name="production_year" 
                        placeholder="e.g., 2024"
                        min="1900" 
                        max="2100" 
                        required>
                </div>
            </div>

            <div>
                <label for="thumbnail">Movie Thumbnail *</label>
                <input 
                    type="file" 
                    id="thumbnail" 
                    name="thumbnail" 
                    accept="image/*" 
                    required>
                <p class="hint">Recommended: 300x450px (2:3 ratio), max 5MB</p>
            </div>

            <div class="form-row">
                <div>
                    <label for="duration">Duration (minutes) *</label>
                    <input 
                        type="number" 
                        id="duration" 
                        name="duration" 
                        placeholder="e.g., 142"
                        min="1" 
                        required>
                </div>

                <div>
                    <label for="genre">Genre *</label>
                    <input 
                        type="text" 
                        id="genre" 
                        name="genre" 
                        placeholder="e.g., Drama, Thriller" 
                        required>
                </div>
            </div>

            <div>
                <label for="description">Short Description *</label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="3" 
                    placeholder="A brief overview of the movie (1-2 sentences)"
                    required></textarea>
            </div>

            <div>
                <label for="synopsis">Full Synopsis *</label>
                <textarea 
                    id="synopsis" 
                    name="synopsis" 
                    rows="5" 
                    placeholder="Detailed plot summary and storyline..." 
                    required></textarea>
            </div>

            <button type="submit">Add Movie to Collection</button>
        </form>
    </main>

    <footer>
        © 2024 CineReserve. All rights reserved.
    </footer>

</body>
</html>
