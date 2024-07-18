<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{

    // 新しいアイデアを作成する
    public function create(Request $request){

        // 新しいIdeaモデルのインスタンスを作成
        $idea = new Idea();

         // 初期値として空文字と０を設定
        $idea->theme = '';
        $idea->user_id = 0;
        $idea->self_chart1 = 0;
        $idea->self_chart2 = 0;
        $idea->self_chart3 = 0;
        $idea->self_chart4 = 0;
        $idea->self_chart5 = 0;
        $idea->elevator1 = '';
        $idea->elevator2 = '';
        $idea->how = '';


        // モデルのインスタンスをデータベースに保存
        $idea->save();


        return redirect()->route('get.select.theme', ['id' => $idea->id]);
    }

    // テーマを更新する
    public function updateTheme(Request $request, $id)
    {
        // $request->validate([
        //     'theme' => 'required|string',
        // ]);

        $idea = Idea::findOrFail($id);
        $idea->theme = $request->theme;
        $idea->save();

        return view('APark.create_radar_chart', ['idea_id' => $idea->id]);

        // return redirect()->route('get.create.radar.chart', ['id' => $id]);
    }

    //チャートを更新する
    public function updateChart(Request $request)
    {
         // hidden で埋め込んでいるパラメータを受け取る
        $id = $request->input('idea_id');

        $idea = Idea::findOrFail($id);
        $idea->update($request->all());

        return view('APark.enter_pitch', ['idea' => $idea]);
    }

    public function updateElevator(Request $request, $id)
{
    // $id = $request->input('idea_id');

    $idea = Idea::findOrFail($id);
    $idea->elevator1 = $request->elevator1;
    $idea->elevator2 = $request->elevator2;
    $idea->how = $request->how;

    //戻るボタンが押された場合
    if($request->input('action') === 'return_page'){
        return view('APark.create_radar_chart', ['idea_id' => $idea]);
    }

    // "結果を見る"ボタンが押された場合
    if ($request->input('action') === 'proceed') {
        $idea->is_posted = '1';
        $idea->save();
        return view('APark.create_feedback', ['idea' => $idea]);
    }

    // "保存する"ボタンが押された場合
    if ($request->input('action') === 'draft') {
        $idea->is_posted = '1';
        $idea->save();

        // return redirect()->route('get.draft', ['id' => $id]);
        return self::showDraft(id:$id);
    }

        // "削除する"ボタンが押された場合
        if ($request->input('action') === 'delete') {
            try {
                $idea->delete();
                return redirect()->route('home')->with('success', 'アイデアが削除されました');
            } catch (\Exception $e) {
                // エラーメッセージを表示するためのデバッグ
                return redirect()->route('home')->with('error', $e->getMessage());
            }
        }

        // 他のアクションが処理されない場合のためのデフォルト戻り値
        return redirect()->route('home')->with('error', '無効なアクションが指定されました');
}

    public function showDraft($id)
{
    $ideas = Idea::where('is_posted', '1')->orderBy('created_at', 'desc')->get();
    return view('APark.draft', ['ideas' => $ideas, 'idea_id' => $id]);
}

public function listDraft()
{
    $ideas = Idea::where('is_posted', '1')->orderBy('created_at', 'desc')->get();
    return view('APark.draft', ['ideas' => $ideas]);
}

public function showSelfRadarChart($id)
{
    $idea = Idea::find($id);
    return view('APark.create_feedback', ['idea' => $idea]);
}


public function index()
    {
        // 投稿されたアイデアのみを取得
        $ideas = Idea::where('is_posted', '2')
                    ->with(['feedbacks' => function ($query) {
                    $query->latest()->first();
                    }])
                    ->orderBy('created_at', 'desc')
                    ->get();

        // ビューにデータを渡す
        return view('APark.home', ['ideas' => $ideas]);
    }
    public function draftToPitch($id){

        $idea = Idea::findOrFail($id);
        return view('APark.enter_pitch', ['idea' => $idea]);
    }

    public function postIdea($id)
{
    // 指定されたアイデアを取得
    $idea = Idea::find($id);

    if ($idea) {
        // アイデアを投稿済みにする
        $idea->is_posted = '2';
        $idea->save();
    }

    // 投稿済みのアイデアのみを取得
    $ideas = Idea::where('is_posted', '2')->orderBy('created_at', 'desc')->get();

    // APark.home ビューにデータを渡して表示
    return view('APark.home', ['ideas' => $ideas]);
}


}
