<?php

namespace App\Http\Controllers;

use App\Services\GeminiService;

class GeminiController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function showBalances()
    {
        $balances = $this->geminiService->getAccountBalances();
        return response()->json($balances);
    }
}
