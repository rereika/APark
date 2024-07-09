<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{

    // 新しいアイデアを作成するメソッド
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
        $request->validate([
            'theme' => 'required|string',
        ]);

        $idea = Idea::findOrFail($id);
        $idea->theme = $request->theme;
        $idea->save();

        return redirect()->route('some.next.page'); // 適切なページにリダイレクト
    }

    //チャートを更新する
    public function updateChart(Request $request)
    {
         // hidden で埋め込んでいるパラメータを受け取る
        $id = $request->input('idea_id');

        $idea = Idea::findOrFail($id);
        $idea->update($request->all());

        return redirect()->route('get.enter.pitch', ['id' => $id]);
    }


    //エレベーターピッチを更新する
    public function updatePitch(Request $request)
    {
         // hidden で埋め込んでいるパラメータを受け取る
        $id = $request->input('idea_id');

        $idea = Idea::findOrFail($id);
        $idea->update($request->all());

        return redirect()->route('get.create.feed.back', ['id' => $id]);
    }

    public function updateElevator(Request $request, $id)
    {
        // $request->validate([
        //     'elevator1' => 'required|text',
        //     'elevator2' => 'required|text',
        // ]);

        $id = $request->input('idea_id');

        $idea = Idea::findOrFail($id);
        $idea->elevator1 = $request->elevator1;
        $idea->elevator2 = $request->elevator2;
        $idea->how = $request->how;
        $idea->save();

        return redirect()->route('get.create.feed.back', ['id' => $idea->id])->with(compact('idea'));
    }

    public function index()
    {
        // 全ユーザーのアイデアを投稿された順（降順）で取得
        $ideas = Idea::orderBy('created_at', 'desc')->get();

        // ビューにデータを渡す
        return view('APark.home', ['ideas' => $ideas]);
    }

}
