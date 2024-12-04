<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Cafe Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        /* Global styles */
        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-optical-sizing: auto;
            color: #fff;
            overflow: hidden;
            background: url("{{ asset('img/coffe1.jpg') }}") no-repeat center center/cover;
        }

        /* Background Animation */
        .background-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url('https://source.unsplash.com/1920x1080/?coffee') no-repeat center center/cover;
            animation: zoomInOut 15s infinite;
            filter: brightness(0.5);
        }

        @keyframes zoomInOut {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        /* Parallax Stars */
        .parallax-stars {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/diagonal-stripes-light.png');
            opacity: 0.2;
            animation: moveStars 20s linear infinite;
        }

        @keyframes moveStars {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 100% 100%;
            }
        }

        /* Welcome Content */
        .welcome-container {
            text-align: center;
            padding: 20px;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }

        .welcome-title {
            font-size: 4.5rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-shadow: 4px 4px 20px rgba(0, 0, 0, 0.5);
        }

        .welcome-subtitle {
            font-size: 1.8rem;
            margin: 20px 0;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
        }

        .welcome-title{
            font-family: "Dancing Script", cursive;
            font-optical-sizing: auto;
        }
        .welcome-subtitle {
  
            font-family: "EB Garamond", serif;
 
        }
        .btn-custom {
            margin-top: 30px;
            padding: 15px 40px;
            font-size: 1.3rem;
            border-radius: 50px;
            font-family:   font-family: "Inter", sans-serif;
            color: #fff;
            /* background: linear-gradient(90deg, #ff7eb3, #ff758c); */
            background-color: #503C3C;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
        }

        .btn-custom:hover {
            transform: translateY(-5px);
            background-color: #3E3232;

        }

        /* Floating Coffee Cup Animation */
        .floating-cup {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%) translateY(0);
            width: 150px;
            animation: floatUpDown 3s infinite ease-in-out;
        }

        @keyframes floatUpDown {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(-20px);
            }
        }
    </style>
</head>

<body>
    <!-- Background Elements -->
    <div class="background-animation"></div>
    <div class="parallax-stars"></div>

    <!-- Welcome Content -->
    <div class="welcome-container">
        <h1 class="welcome-title">Kasir Cafe Coffee </h1>
        <p class="welcome-subtitle">   
            "Rasakan Keajaiban Aroma, Nikmati Setiap Momen dengan Kopi Terbaik."</p>
        <a href="{{ route('login') }}" class="btn btn-custom">Login</a>
        <a href="{{ route('register') }}" class="btn btn-custom">Register</a>

    </div>

</body>

</html>
