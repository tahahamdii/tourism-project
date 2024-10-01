<!DOCTYPE html>
<html>
<head>
    <title>Tourism App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic CSS reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #f8f9fa;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 8px 15px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #ddd;
            border-radius: 4px;
        }

        /* Main content styling */
        .container {
            margin-top: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Eco Tourism</a>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/destinations">Destinations</a></li>
            <li><a href="/activities">Activities</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="/transports">Transports</a></li>

            
        </ul>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
