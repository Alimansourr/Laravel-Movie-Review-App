<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie Review</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
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
            font-size: 14px;
            color: #555;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 13px;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        select,
        textarea {
            border: 1px solid #aaa;
            padding: 8px;
            font-size: 13px;
            background-color: #fff;
            color: #000;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
        }

        button:hover {
            background-color: #555;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-top: 20px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #0066cc;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Share Your Review</h1>
        <p class="subtitle">Tell us what you thought about the movie</p>

        <form action="{{ route('user.review') }}" method="POST">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">

            <label for="title">Review Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="e.g., A Masterpiece of Modern Cinema"
            >

            <label for="rating">Rating</label>
            <select id="rating" name="rating" required>
                <option value="">-- Select Rating --</option>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>

            <label for="review_content">Your Review</label>
            <textarea 
                id="review_content" 
                name="review_content" 
                placeholder="Share your thoughts about the plot, acting, cinematography, and overall experience..."
            ></textarea>

            <button type="submit">Submit Review</button>
        </form>

        <a href="/Movies" class="back-link">← Back to Movies</a>

        <footer>
            © 2024 CineReserve. All rights reserved.
        </footer>
    </div>

</body>
</html>
