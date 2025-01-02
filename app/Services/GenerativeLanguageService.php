<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GenerativeLanguageService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key');
        $this->baseUrl = config('services.gemini.base_url');
    }

    public function generateContent($text)
    {
        $url = $this->baseUrl . '?key=' . $this->apiKey;

        $data = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $text],
                    ],
                ],
            ],
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, $data);

            if ($response->successful()) {
                return $response->json(); // Return the successful JSON response.
            }

            return [
                'error' => true,
                'message' => $response->body(), // Return the error message from the API.
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
