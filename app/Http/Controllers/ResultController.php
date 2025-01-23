<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class ResultController extends Controller
{

    public function index()
    {
        return view('Result');
    }

    public function chat(Request $request){
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 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',
                'Content-Type' => 'application/json',
            ])->post('https://api.perplexity.ai/chat/completions', [
                'messages' => $request->input('question'),
                'model' => $request->input('model'),
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'API Request Failed'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
