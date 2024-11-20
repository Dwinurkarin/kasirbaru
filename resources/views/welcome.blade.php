<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Coffee Café</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@500&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9d8e7;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }


        header {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 2rem;
            border-radius: 15px;
            max-width: 90%;
            margin: 0 auto;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            margin: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        p {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            margin-top: 0.5rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .btn {
            display: inline-block;
            margin-top: 2rem;
            text-decoration: none;
            background-color: #ebb98e;
            color: #fff;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #8b4513;
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .btn:active {
            transform: translateY(2px);
        }

        .auth-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .auth-links a {
            background-color: #fff;
            color: #4b4b4c;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .auth-links a:hover {
            background-color: #f3bfe3;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Coffee Café</h1>
        <p>Your perfect place to enjoy freshly brewed coffee.</p>

        <!-- Auth Links -->
        <div class="auth-links">
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </header>
</body>

</html>
