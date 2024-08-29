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
        $idea->theme = 0;
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

    public function draftDelete(Request $request)
{

    // 'delete'という名前のチェックボックスから送信された値を取得(配列)
    $ids = $request->input('delete');

    // 下書きが選択されていない場合は何もせずにリダイレクト
    if (empty($ids)) {
        return redirect()->route('get.list.draft')->with('message', '下書きが選択されていません。');
    }

    // 選択された下書きを削除
    Idea::whereIn('id', $ids)->delete();

    // 削除完了後にリダイレクト
    return redirect()->route('get.list.draft')->with('message', '選択された下書きが削除されました。');
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


public function themeRankList(Request $request)
{
    $theme = $request->input('theme_rank');

    if ($theme == 'theme1') {
        $ideas = Idea::where('theme', 1)
                    ->where('is_posted', '2')
                    ->with('feedbacks')
                    ->orderBy('created_at', 'desc')
                    ->get();
    } elseif ($theme == 'theme2') {
        $ideas = Idea::where('theme', 2)
                    ->where('is_posted', '2')
                    ->with('feedbacks')
                    ->orderBy('created_at', 'desc')
                    ->get();
    } elseif ($theme == 'theme3') {
        $ideas = Idea::where('theme', 3)
                    ->where('is_posted', '2')
                    ->with('feedbacks')
                    ->orderBy('created_at', 'desc')
                    ->get();
    } else {
        $ideas = Idea::where('is_posted', '2')
                    ->with('feedbacks')
                    ->orderBy('created_at', 'desc')
                    ->get();
    }

    return view('APark.home', ['ideas' => $ideas]);
}


public function index()
{
    $ideas = Idea::where('is_posted', '2')
                ->with('feedbacks')
                ->orderBy('created_at', 'desc')
                ->get();

    // dd($ideas); // ここでデータの内容を確認
    // foreach($ideas as $idea){
    //     var_dump($idea->id);
    // }
    // die;
    return view('APark.home', ['ideas' => $ideas]);
}


    public function destroy($id)
    {
        // 削除対象のレコードを取得
        $idea = Idea::findOrFail($id);

        // レコードを削除
        $idea->delete();

        // リダイレクトまたは応答を返す
        return redirect()->route('home')->with('success', 'アイデアが削除されました。');
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

public function getIdeas(Request $request)
    {
        // クエリパラメータからテーマIDを取得
        $themeId = $request->query('theme_id');

        // テーマIDに基づいてアイデアを取得
        $ideas = Idea::where('theme', $themeId)->with('feedbacks')->get();

        // データをJSON形式で返す
        return response()->json([
            'ideas' => $ideas
        ]);
    }


}
