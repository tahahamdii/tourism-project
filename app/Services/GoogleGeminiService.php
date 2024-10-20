<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GoogleGeminiService
{
    protected $client;
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = env('GOOGLE_GEMINI_API_URL');
        $this->apiKey = env('GOOGLE_GEMINI_API_KEY');
    }

    public function sendMessage($message)
    {
        try {
            $response = $this->client->post($this->baseUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'prompt' => $message,
                    'max_tokens' => 1000,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Log the error message and the stack trace for debugging
            Log::error('Error sending message to Google Gemini API', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'message' => $message, // Optional: log the input message for context
            ]);
            return ['error' => 'An error occurred while communicating with the API.'];
        }
    }
}
