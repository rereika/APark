<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Log クラスのインポートを追加
use App\Services\OpenAIService;
use App\Models\Idea;
use App\Models\Feedback;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
    public function generateAndRedirect(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);

        $idea->elevator1 = $request->elevator1;
        $idea->elevator2 = $request->elevator2;
        $idea->how = $request->how;

        //戻るボタンが押された場合
        if ($request->input('action') === 'return_page') {
            return view('APark.create_radar_chart', ['idea_id' => $idea->id]);


        //下書き保存ボタンが押された場合
        } elseif ($request->input('action') === 'draft') {
            $idea->is_posted = '1';
            $idea->save();
            $ideas = Idea::where('is_posted', '1')->orderBy('created_at', 'desc')->get();
            return view('APark.draft', ['ideas' => $ideas, 'idea_id' => $id]);


        } elseif ($request->input('action') === 'delete') {
            try {
                $idea->delete();
                return redirect()->route('home')->with('success', 'アイデアが削除されました');
            } catch (\Exception $e) {
                return redirect()->route('home')->with('error', $e->getMessage());
            }

        } elseif ($request->input('action') === 'proceed') {
            $idea->is_posted = '1';
            $idea->save();

            $prompts = [
                "このアイデアが他のアプリと比べてどれほどユニークか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアはHTML、CSS、JavaScript、Laravelで作成できるか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアは新しいか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアはユーザーの可能性を広げるか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアのどこが創造的か、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}"
            ];

            $feedback = new Feedback();
            $feedback->idea_id = $idea->id;
/* デバッグ用にコメントアウト
            foreach ($prompts as $index => $prompt) {
                $response = $this->openAIService->generateText($prompt);
                Log::info(['prompt_response' => $response]); // レスポンスをログに出力

                // レスポンスから数値を抽出（例: "5" のような評価を期待している場合）
                preg_match('/(\d)/', $response, $matches);
                $scoreValue = isset($matches[1]) ? intval($matches[1]) : 0;
                $feedback->{'fb_chart' . ($index + 1)} = $scoreValue;
                $feedback->{'comment' . ($index + 1)} = $response;
            }
*/

// Mock START
            // APIモック。APIトークンを消費させないための簡易的なモックコード。
            $feedback->{'fb_chart1'} = '1';
            $feedback->{'fb_chart2'} = '2';
            $feedback->{'fb_chart3'} = '3';
            $feedback->{'fb_chart4'} = '4';
            $feedback->{'fb_chart5'} = '5';

            $feedback->{'comment1'} = json_decode($this->mockResponse('コメント１')->getContent(), true)['choices'][0]['message']['content'];
            $feedback->{'comment2'} = json_decode($this->mockResponse('コメント２')->getContent(), true)['choices'][0]['message']['content'];
            $feedback->{'comment3'} = json_decode($this->mockResponse('コメント３')->getContent(), true)['choices'][0]['message']['content'];
            $feedback->{'comment4'} = json_decode($this->mockResponse('コメント４')->getContent(), true)['choices'][0]['message']['content'];
            $feedback->{'comment5'} = json_decode($this->mockResponse('コメント５')->getContent(), true)['choices'][0]['message']['content'];
// Mock END

            // デバッグ用のフィードバックデータをログに出力
            Log::info(['feedback' => $feedback]);

            $feedback->save();

            return view('APark.create_feedback', ['idea' => $idea, 'feedback' => $feedback]);
        } else {
            return redirect()->route('home')->with('error', '無効なアクションが指定されました');
        }
    }

    // APIテスト用モック
    private static function mockResponse($mockResponse){
        return response()->json([
            'id' => 'mock_chat_id',
            'object' => 'chat.completion',
            'created' => time(),
            'model' => 'gpt-3.5-turbo',
            'usage' => ['prompt_tokens' => 10, 'completion_tokens' => 10, 'total_tokens' => 20],
            'choices' => [
                [
                    'message' => [
                        'role' => 'assistant',
                        'content' => $mockResponse,
                    ],
                    'finish_reason' => 'stop',
                    'index' => 0,
                ],
            ],
        ]);
    }
}
