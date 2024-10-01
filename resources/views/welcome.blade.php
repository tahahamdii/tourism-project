@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        
        .background {
            /* Use the image as background */
            background-image: url('/aa.jpg');
            /* Make sure the background covers the full page */
            height: auto;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 48px;
            font-color: black;
        }
        .h1{
            color: black;
        }
    </style>
</head>
<body>
    <div class="background">
        <!-- Display the title in the center -->
        <h1>Welcome Back</h1>
    </div>
</body>
</html>
@endsection
