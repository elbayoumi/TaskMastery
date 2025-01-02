<?php

namespace App\Http\Controllers;

use App\Services\GenerativeLanguageService;
use Illuminate\Http\Request;

class GenerativeLanguageController extends Controller
{
    protected $service;

    public function __construct(GenerativeLanguageService $service)
    {
        $this->service = $service;
    }

    public function generate(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:500',
        ]);

        $text = $request->input('text');
        $result = $this->service->generateContent($text);

        if (isset($result['error']) && $result['error']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $result,
        ]);
    }
}
