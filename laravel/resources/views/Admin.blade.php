<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Admin Dashboard</title>
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
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            font-size: 20px;
            color: #000;
        }

        .add-btn {
            background-color: #333;
            color: white;
            padding: 7px 12px;
            border: none;
            text-decoration: none;
            font-size: 13px;
        }

        .add-btn:hover {
            background-color: #555;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 15px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        p.subtitle {
            color: #555;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 15px;
        }

        .movie-card {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .movie-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border: 1px solid #ccc;
            margin-bottom: 8px;
        }

        .movie-card h2 {
            font-size: 16px;
            margin: 5px 0;
        }

        .movie-card p {
            font-size: 13px;
            color: #555;
            height: 38px;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 10px;
        }

        .movie-actions {
            display: flex;
            gap: 5px;
            border-top: 1px solid #ddd;
            padding-top: 8px;
        }

        .movie-actions button,
        .movie-actions form button {
            flex: 1;
            font-size: 13px;
            padding: 6px;
            cursor: pointer;
            border: none;
            color: white;
        }

        .edit-btn {
            background-color: #228B22;
        }

        .edit-btn:hover {
            background-color: #1b6d1b;
        }

        .delete-btn {
            background-color: #c0392b;
        }

        .delete-btn:hover {
            background-color: #a93226;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            margin-top: 30px;
        }

        .empty-state h3 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #555;
            margin-bottom: 15px;
        }

        .empty-state a {
            background-color: #333;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            font-size: 13px;
        }

        .empty-state a:hover {
            background-color: #555;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #555;
            padding: 10px;
            border-top: 1px solid #ccc;
            background-color: #fff;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav>
        <div class="nav-content">
            <div class="nav-title">
                🎬 Admin Dashboard
            </div>
            <a href="/Addmovie" class="add-btn">+ Add Movie</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <h1>Movie Library</h1>
        <p class="subtitle">Manage your movie collection</p>

        @if(count($moviesss) > 0)
            <div class="movie-grid">
                @foreach ($moviesss as $movi)
                    <div class="movie-card">
                        <img src="/assets/{{$movi->thumbnail}}" alt="Thumbnail for {{$movi->title}}">
                        <h2>{{$movi->title}}</h2>
                        <p>{{$movi->description}}</p>

                        <div class="movie-actions">
                            <button class="edit-btn" onclick="window.location='/update/{{$movi->id}}'">Edit</button>
                            
                            <form action="{{ route('movie.delete', $movi->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No Movies Yet</h3>
                <p>Start building your collection by adding your first movie.</p>
                <a href="/Addmovie">Add Your First Movie</a>
            </div>
        @endif
    </main>

    <footer>
        © 2024 CineReserve. All rights reserved.
    </footer>

</body>
</html>
