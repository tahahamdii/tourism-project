<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class ChatController extends Controller
{
    /**
     * Show the chat form.
     *
     * @return \Illuminate\View\View
     */
    public function showChatForm()
    {
        return view('chat.chat'); // Ensure this view exists
    }

    /**
     * Handle incoming requests.
     *
     * @param Request $request
     * @return string
     */
    public function __invoke(Request $request): string
    {
        try {
            /** @var array $response */
            $response = Http::withHeaders([
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . env('GOOGLE_GEMINI_API_KEY') // Use your Google Gemini API Key
            ])->post('https://api.google.com/gemini/v1/chat', [ // Update with the correct endpoint
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $request->post('content')
                    ]
                ],
                "max_tokens" => 2048 // Adjust as needed
            ]);

            $responseBody = json_decode($response->body(), true);

            if (isset($responseBody['choices'][0]['message']['content'])) {
                return $responseBody['choices'][0]['message']['content'];
            }

            return "Unexpected response structure.";
        } catch (Throwable $e) {
            \Log::error('Google Gemini API error: ' . $e->getMessage());
            return "An error occurred while communicating with the Google Gemini API.";
        }
    }
}
