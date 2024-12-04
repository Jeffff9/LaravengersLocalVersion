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

        $question = session('question');

        if (!$question) {
            return redirect('/')->with('error', 'No question found.');
        }

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $question],
            ],
        ]);

        $responseContent = $result->choices[0]->message->content ?? 'No response from OpenAI.';
    } catch (\Exception $e) {
        $responseContent = 'An error occurred: ' . $e->getMessage();
    }

    return view('Result', ['result' => $responseContent], compact('question'));
    }
}
