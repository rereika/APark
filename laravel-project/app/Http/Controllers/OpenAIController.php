<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use App\Models\Idea; // Ideaモデルをインポート
use App\Models\Feedback;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generate(Request $request)
    {
        $prompt = $request->input('prompt');
        $generatedText = $this->openAIService->generateText($prompt);

        // 投稿されたアイデアのみを取得
        $ideas = Idea::where('is_posted', '2')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('APark.home', compact('generatedText', 'ideas'));
    }

    public function generateAndRedirect(Request $request, $id)
{
    $idea = Idea::findOrFail($id);

    // ユーザーの入力をIdeaモデルに保存
    $idea->elevator1 = $request->elevator1;
    $idea->elevator2 = $request->elevator2;
    $idea->how = $request->how;

    // 戻るボタンが押された場合
    if ($request->input('action') === 'return_page') {
        return view('APark.create_radar_chart', ['idea_id' => $idea->id]);

    //"保存する"ボタンが押された場合
    } elseif ($request->input('action') === 'draft') {
        $idea->is_posted = '1';
        $idea->save();
        $ideas = Idea::where('is_posted', '1')->orderBy('created_at', 'desc')->get();
        return view('APark.draft', ['ideas' => $ideas, 'idea_id' => $id]);

    // "削除する"ボタンが押された場合
    } elseif ($request->input('action') === 'delete') {
        try {
            $idea->delete();
            return redirect()->route('home')->with('success', 'アイデアが削除されました');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }

    // "結果を見る"ボタンが押された場合
    } elseif ($request->input('action') === 'proceed') {
        $idea->is_posted = '1';
        $idea->save();

        // フィードバックを生成して保存
        $prompts = [
            "Please rate in Japanese whether this idea is unique compared to other apps in the world: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "Can this idea be created with HTML, CSS, JavaScript, Laravel? Please rate it in Japanese: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "Is this idea new? Please rate in Japanese: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "Can this idea expand the possibilities for users? Please rate in Japanese: {$request->elevator1}, {$request->elevator2}, {$request->how}",
            "What was the exciting idea while creating this? Please rate in Japanese.: {$request->elevator1}, {$request->elevator2}, {$request->how}"
        ];

        $feedback = new Feedback();
        $feedback->idea_id = $idea->id;

        foreach ($prompts as $index => $prompt) {
            $response = $this->openAIService->generateText($prompt);
            $feedback->{'comment' . ($index + 1)} = $response;
        }

        $feedback->save();

        return view('APark.create_feedback', ['idea' => $idea, 'feedback' => $feedback]);
    } else {
        return redirect()->route('home')->with('error', '無効なアクションが指定されました');
    }
}

}
