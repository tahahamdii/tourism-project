<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
</head>
<body>
    <h1>Chatbot</h1>
    <form action="{{ route('chat.sendMessage') }}" method="POST">
        @csrf
        <label for="message">Enter your message:</label><br>
        <input type="text" id="message" name="message" value="{{ old('message') }}" required><br><br>
        <button type="submit">Send</button>
    </form>

    @if (isset($response))
        <h2>Response:</h2>
        <p>{{ $response['choices'][0]['text'] ?? 'No response from the API' }}</p>
    @endif
</body>
</html>
