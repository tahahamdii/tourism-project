<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">
    <title>{{ $post->title }}</title>
    <!-- Add some basic styles for better presentation -->

</head>
<body>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
<h1><a href="/posts">Back</a></h1>
</body>
</html>
