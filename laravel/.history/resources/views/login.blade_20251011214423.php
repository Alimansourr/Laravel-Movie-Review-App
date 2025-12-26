<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineReserve - Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 100%;
            max-width: 350px;
            margin: 80px auto;
            background: #fff;
            border: 1px solid #ccc;
            padding: 20px 25px;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 5px;
            color: #333;
        }

        p.subtitle {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #aaa;
            font-size: 14px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .signup-text {
            text-align: center;
            font-size: 13px;
            color: #444;
            margin-top: 15px;
        }

        .signup-text a {
            color: #0066cc;
            text-decoration: none;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 15px;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #c8e5bc;
        }

        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebcccc;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome Back</h1>
        <p class="subtitle">Sign in to continue to CineReserve</p>

        <form action="{{route('user.login')}}" method="get">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" placeholder="your@email.com" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <button type="submit">Sign In</button>
        </form>

        <div class="signup-text">
            Don't have an account?
            <a href="/SignUp">Create Account</a>
        </div>

        @if (isset($login) && $login=='User logged in successfully')
            <div class="message success">✓ Successfully logged in</div>
            <script>
                window.location.href = "{{ url('/Movies') }}";
            </script>
        @elseif(isset($login) && $login=='Admin logged in successfully')
            <div class="message success">✓ Admin login successful</div>
            <script>
                window.location.href = "{{ url('/admin') }}";
            </script>
        @endif

        @if (isset($logged))
            <div class="message error">Account not found. Please sign up first.</div>
        @endif

        <footer>© 2024 CineReserve. Secure movie booking platform.</footer>
    </div>

</body>
</html>
