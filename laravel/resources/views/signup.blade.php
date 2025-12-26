<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Movie Hub</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
        }

        .container {
            max-width: 400px;
            margin: 40px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 25px;
        }

        h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 5px;
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
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            font-size: 13px;
            border: 1px solid #aaa;
            background-color: #fff;
            color: #000;
            box-sizing: border-box;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row > div {
            flex: 1;
        }

        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 5px;
            width: 100%;
        }

        button:hover {
            background-color: #555;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }

        .login-link a {
            color: #0073e6;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .info {
            text-align: center;
            font-size: 11px;
            color: #555;
            margin-top: 15px;
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

    <div class="container">
        <h2>Create Account</h2>
        <p class="subtitle">Join our movie community today</p>

        <form action="{{ route('user.create') }}" method="POST">
            @csrf

            <div class="form-row">
                <div>
                    <label for="firstname">First Name *</label>
                    <input type="text" id="firstname" name="firstname" placeholder="John" required>
                </div>

                <div>
                    <label for="lastname">Last Name *</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Doe" required>
                </div>
            </div>

            <div>
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" placeholder="john.doe@example.com" required>
            </div>

            <div>
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
                <p style="font-size: 12px; color: #666;">Must be at least 8 characters</p>
            </div>

            <div class="form-row">
                <div>
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div>
                    <label for="age">Age *</label>
                    <input type="number" id="age" name="age" min="18" max="100" placeholder="18+" required>
                </div>
            </div>

            <button type="submit">Create Account</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="/login">Sign In</a>
        </div>

        <p class="info">
            By signing up, you agree to our Terms of Service and Privacy Policy.
        </p>
    </div>

    <footer>
        © 2024 Movie Hub. All rights reserved.
    </footer>

</body>
</html>
