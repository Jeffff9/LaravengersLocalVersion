<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use OpenAI\Laravel\Facades\OpenAI;

class ResultController extends Controller
{
    public function index(Request $request)
{
    try {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => '12:00から　海遊館(約1時間滞在)　と　清水寺(約1時間滞在）と天王寺動物園（約２時間滞在）時間割表を詳しく梅田駅出発　近く場所優先　定休日と営業時間と最終入場時間を確認しながら時間割表を詳しく教えて　日本語で教えてください。'],
            ],
        ]);

        // Extract the response content safely
        $responseContent = $result->choices[0]->message->content ?? 'No response from OpenAI.';
    } catch (\Exception $e) {
        $responseContent = 'An error occurred: ' . $e->getMessage();
    }

    // Pass the response content (string) to the view
    return view('Result', ['result' => $responseContent]);
    }
}

