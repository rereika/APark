<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        //GuzzleHttpクライアントを初期化
        $this->client = new Client([
            //OpenAI APIのベースURIと必要なヘッダー（AuthorizationとContent-Type）を持つ
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function generateText($prompt)
{
    $response = $this->client->post('completions', [
        'json' => [
            'model' => 'gpt-3.5-turbo', // 適切なモデル名に変更する
            'prompt' => $prompt,
            'max_tokens' => 150,
        ],
    ]);

    $data = json_decode($response->getBody()->getContents(), true);
    return $data['choices'][0]['text'] ?? '';
}

}
