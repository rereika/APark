<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Log クラスのインポートを追加
use App\Services\OpenAIService;
use App\Models\Idea;
use App\Models\Feedback;
use App\Models\User;

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
    $user_id = $idea->user_id;
    $user = User::findOrFail($user_id);
    $whyEngineer = $user->why_engineer;

    // 元のプロンプトの取得
    $originalElevator1 = $idea->elevator1;
    $originalElevator2 = $idea->elevator2;
    $originalHow = $idea->how;

    // 新しいリクエストのデータで更新
    $idea->elevator1 = $request->elevator1;
    $idea->elevator2 = $request->elevator2;
    $idea->how = $request->how;

    // 戻るボタンが押された場合
    if ($request->input('action') === 'return_page') {
        return view('APark.create_radar_chart', ['idea_id' => $idea->id]);

    // 下書き保存ボタンが押された場合
    } elseif ($request->input('action') === 'draft') {
        $idea->is_posted = '1';
        $idea->save();
        $ideas = Idea::where('is_posted', '1')->orderBy('created_at', 'desc')->get();
        return view('APark.draft', ['ideas' => $ideas, 'idea_id' => $id]);

    // 削除するボタンが押された場合
    } elseif ($request->input('action') === 'delete') {
        try {
            $idea->delete();
            return redirect()->route('home')->with('success', 'アイデアが削除されました');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }

    // →ボタンが押された場合
    } elseif ($request->input('action') === 'proceed') {

        // 既にセッションにAPI実行済みのデータがある場合
        if (session()->has('api_called_' . $idea->id)) {
            // 3つのフィールドが変更された場合は再度APIを実行
            if ($originalElevator1 !== $request->elevator1 ||
                $originalElevator2 !== $request->elevator2 ||
                $originalHow !== $request->how) {

                // セッションをクリア、APIを再実行
                session()->forget('api_called_' . $idea->id);
            } else {
                $feedback = session('api_called_' . $idea->id);
                return view('APark.create_feedback', ['idea' => $idea, 'feedback' => $feedback]);
            }
        }

        // APIが実行されていない、もしくは変更があった場合にAPIを実行
        $idea->is_posted = '1';
        $idea->save();

        $prompts = [
            "世の中にある他のアプリと比べてどれほどユニークか、5段階で評価し25文字内で答えよ: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "HTML、CSS、JavaScript、LaravelまたはRubyで作成可能か、5段階で評価し25文字内で答えよ: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "目新しいか、5段階で評価し25文字内で答えよ: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "エンジニアになりたい理由とアプリのストーリー性はあるか、5段階で評価し25文字内で答えよ: {$whyEngineer},{$request->elevator1}, {$request->elevator2}, {$request->how}",
            "どこが創造的か、5段階で評価し25文字内で答えよ: {$request->elevator1}, {$request->elevator2}, {$request->how}"
        ];

        // feedbackテーブルに同じidea_idはあるか？
        $feedback = Feedback::where('idea_id', $idea->id)->first();

        // 存在しない場合は新しいオブジェクトを生成
        if (!$feedback) {
        $feedback = new Feedback();
        $feedback->idea_id = $idea->id;
        }

        foreach ($prompts as $index => $prompt) {
            $response = $this->openAIService->generateText($prompt);
            Log::info(['prompt_response' => $response]); // レスポンスをログに出力
            preg_match('/(\d)/', $response, $matches);
            $scoreValue = isset($matches[1]) ? intval($matches[1]) : 0;

            // フィードバックデータを上書き保存
            $feedback->{'fb_chart' . ($index + 1)} = $scoreValue;
            $feedback->{'comment' . ($index + 1)} = $response;
        }

        // フィードバックをセッションに保存して、再実行を防ぐ
        session(['api_called_' . $idea->id => $feedback]);

        // デバッグ用ログ
        Log::info(['feedback' => $feedback]);

        // フィードバックを保存
        $feedback->save();

        return view('APark.create_feedback', ['idea' => $idea, 'feedback' => $feedback]);
    } else {
        return redirect()->route('home')->with('error', '無効なアクションが指定されました');
    }
}

}
    // APIテスト用モック
//     private static function mockResponse($mockResponse){
//         return response()->json([
//             'id' => 'mock_chat_id',
//             'object' => 'chat.completion',
//             'created' => time(),
//             'model' => 'gpt-3.5-turbo',
//             'usage' => ['prompt_tokens' => 10, 'completion_tokens' => 10, 'total_tokens' => 20],
//             'choices' => [
//                 [
//                     'message' => [
//                         'role' => 'assistant',
//                         'content' => $mockResponse,
//                     ],
//                     'finish_reason' => 'stop',
//                     'index' => 0,
//                 ],
//             ],
//         ]);
//     }
// }


// Mock START
            // APIモック。APIトークンを消費させないための簡易的なモックコード。
            // $feedback->{'fb_chart1'} = '5';
            // $feedback->{'fb_chart2'} = '5';
            // $feedback->{'fb_chart3'} = '5';
            // $feedback->{'fb_chart4'} = '3';
            // $feedback->{'fb_chart5'} = '4';

            // $feedback->{'comment1'} = json_decode($this->mockResponse('既存のアプリで○○という〜〜〜')->getContent(), true)['choices'][0]['message']['content'];
            // $feedback->{'comment2'} = json_decode($this->mockResponse('コメント２')->getContent(), true)['choices'][0]['message']['content'];
            // $feedback->{'comment3'} = json_decode($this->mockResponse('コメント３')->getContent(), true)['choices'][0]['message']['content'];
            // $feedback->{'comment4'} = json_decode($this->mockResponse('コメント４')->getContent(), true)['choices'][0]['message']['content'];
            // $feedback->{'comment5'} = json_decode($this->mockResponse('コメント５')->getContent(), true)['choices'][0]['message']['content'];
// Mock END
