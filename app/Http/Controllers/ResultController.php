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
            $question = session('question', null);

            if (!$question) {
                return redirect('/')->with('error', 'プランを生成できませんでした。');
            }

            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => '与えられた情報に基づいて、具体的な観光プランを作成してください。営業時間や定休日を考慮し、現実的な移動時間も含めてください。'
                    ],
                    ['role' => 'user', 'content' => $question],
                ],
                'temperature' => 0.7,
                'max_tokens' => 1000
            ]);

            $responseContent = $result->choices[0]->message->content ?? 'プランを生成できませんでした。';

            return view('Result', [
                'result' => $responseContent,
                'question' => $question
            ]);
        } catch (\Exception $e) {
            \Log::error('OpenAI API Error: ' . $e->getMessage());
            return redirect('/')->with('error', 'プランの生成中にエラーが発生しました。');
        }
    }

    public function generatePlan(Request $request)
    {
        try {
            $question = $request->input('question');
            \Log::info('Received question:', ['question' => $question]);

            if (!$question) {
                return response()->json(['success' => false, 'message' => '質問が見つかりません。'], 400);
            }

            session(['question' => $question]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Generate plan error:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'エラーが発生しました。'], 500);
        }
    }
}
