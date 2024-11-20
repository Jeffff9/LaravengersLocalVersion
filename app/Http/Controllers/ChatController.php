<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $client = new Client();
        $apiKey = env('OPENAI_API_KEY'); // .envからAPIキーを取得

        try {
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => $request->input('message')],
                    ],
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return response()->json($data['choices'][0]['message']['content']);

        } catch (ClientException $e) {
            if ($e->getCode() == 429) {
                sleep(5); // 429エラーの際は5秒待機して再試行
                return $this->chat($request);
            }

            return response()->json([
                'error' => 'API request failed: ' . $e->getMessage()
            ], $e->getCode());
        }
    }
}
