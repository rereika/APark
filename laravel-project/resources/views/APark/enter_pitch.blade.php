<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/enter_pitch.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="back_page">
    <a href="{{ route('get.create.radar.chart', ['id' => $idea->id]) }}" class="return_pitch_page">一つ戻る</a>
    </div>

    <form id="chartForm" method="POST" action="{{ route('ideas.update.elevator', ['id' => $idea->id]) }}">
        @csrf
        <div class="inner">

            <div class="chart-pitch-wrapper">
                <input type="hidden" name="self_chart1" value="{{ $idea->self_chart1 }}">
                <input type="hidden" name="self_chart2" value="{{ $idea->self_chart2 }}">
                <input type="hidden" name="self_chart3" value="{{ $idea->self_chart3 }}">
                <input type="hidden" name="self_chart4" value="{{ $idea->self_chart4 }}">
                <input type="hidden" name="self_chart5" value="{{ $idea->self_chart5 }}">

                <div class="chart">
                    <canvas id="radarChart" width="200" height="200"></canvas>
                </div>

                <div class="pitch">
                    <h2><span class="highlight">エレベーターピッチ</span>をお聞かせください。</h2>
                    <ul>
                        <li>
                            <textarea id="input_pitch1" name="elevator1" rows="4" cols="50" placeholder="「アイデア思案の手助け」が欲しい「APPRENTICE生」向けの、
「APark」という「CGMアプリ」です。">{{ $idea->elevator1 ?? '' }}</textarea>
                        </li>
                        <li>
                            <textarea id="input_pitch2" name="elevator2" rows="4" cols="50"
                                placeholder="これは「APPRENTICEのカリキュラムに沿った形式でアイデアをレーダーチャートにまとめ、先輩や後輩とアイデアを共有する」ことができます">{{ $idea->elevator2 ?? '' }}</textarea>
                        </li>
                    </ul>
                    <h2><span class="highlight">どのように</span>解決しますか？</h2>
                    <textarea id="input_solution" name="how" rows="8" cols="50" placeholder="・レーダーチャートでアイデアを評価
各アイデアに対して1つのレーダーチャートを作成し、アイデアの強みと弱点を客観的に評価する（ChatGPT API）

・ユーザー間フォードバック機能
先輩のアイデアを参照し、過去の経験を蓄積・共有することで、新しいアイデア出しの参考にする。

・アイデアの検索
カリキュラムごとのテーマ（「自分たちの役に立つものを開発せよ」「ワクワクするものを開発せよ」「オリジナルプロダクト」）でアイデアを検索できる。">{{ $idea->how ?? '' }}</textarea>
                </div>
            </div>
            <input type="hidden" name="idea_id" value="{{ $idea->id }}">

            <div class="status">
                <ul>
                    <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
                    <li><img src="{{ asset('image/status2-2.png') }}" alt="ロゴ画像"></li>
                    <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
                    <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
                </ul>
            </div>
        </div>

        <div class="next_page">
        <button type="submit" class="draft" name="action" value="draft">下書きを保存する</button>
        <button type="submit" class="proceed_fb_page" id="proceedFbPage" name="action" value="proceed">結果を見る</button>

        </div>

    </form>
    <script src="{{ asset('js/enter_pitch.js') }}"></script>
</body>

</html>
