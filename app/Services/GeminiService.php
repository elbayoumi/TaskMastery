<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected $apiKey;
    protected $apiSecret;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key');
        $this->apiSecret = config('services.gemini.api_secret');
        $this->baseUrl = config('services.gemini.base_url');
    }

    public function getAccountBalances()
    {
        $endpoint = '/balances';
        $url = $this->baseUrl . $endpoint;

        $nonce = (string) round(microtime(true) * 1000);
        $payload = base64_encode(json_encode([
            'request' => $endpoint,
            'nonce' => $nonce,
        ]));

        $signature = hash_hmac('sha384', $payload, $this->apiSecret);

        $headers = [
            'X-GEMINI-APIKEY' => $this->apiKey,
            'X-GEMINI-PAYLOAD' => $payload,
            'X-GEMINI-SIGNATURE' => $signature,
        ];

        $response = Http::withHeaders($headers)->post($url);

        return $response->json();
    }
}
