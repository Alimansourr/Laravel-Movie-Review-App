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
            background: linear-gradient(135deg, #2c2c54, #24243e);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            padding: 30px 25px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .logo-box {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #7b2ff7, #f107a3);
            width: 60px;
            height: 60px;
            border-radius: 12px;
            margin: 0 auto 15px;
        }

        .logo-box svg {
            width: 30px;
            height: 30px;
            color: white;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
            font-size: 24px;
        }

        p.subtitle {
            text-align: center;
            color: #ccc;
            font-size: 14px;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #ddd;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #555;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input::placeholder {
            color: #aaa;
        }

        button {
            width: 100%;
            background: #7b2ff7;
            color: white;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #6610f2;
        }

        .signup-text {
            text-align: center;
            color: #ccc;
            font-size: 13px;
            margin-top: 15px;
        }

        .signup-text a {
            color: #bb86fc;
            text-decoration: none;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 6px;
            font-size: 14px;
            text-align: center;
        }

        .success {
            background-color: rgba(0, 128, 0, 0.2);
            border: 1px solid rgba(0, 255, 0, 0.3);
            color: #90ee90;
        }

        .error {
            background-color: rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.4);
            color: #ff9999;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Logo/Brand Section -->
        <div class="logo-box">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
            </svg>
        </div>
        <h1>Welcome Back</h1>
        <p class="subtitle">Sign in to continue to CineReserve</p>

        <!-- Login Card -->
        <form action="{{route('user.login')}}" method="get">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" placeholder="your@email.com" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <button type="submit">Sign In</button>
        </form>

        <!-- Sign Up Link -->
        <div class="signup-text">
            Don't have an account?
            <a href="/SignUp">Create Account</a>
        </div>

        <!-- Success & Error Messages -->
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
