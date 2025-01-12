<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }

    // 接收前端請求，並向 Perplexity API 發送請求
    public function chat(Request $request)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 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',
                'Content-Type' => 'application/json',
            ])->post('https://api.perplexity.ai/chat/completions', [
                'messages' => $request->input('messages'),
                'model' => $request->input('model'),
            ]);

            return $response->json();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
