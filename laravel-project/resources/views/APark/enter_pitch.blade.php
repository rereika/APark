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
    <a href="{{ route('create.radar.chart')}}" class="return_pitch_page">一つ戻る</a>
    </div>
    <div class="inner">

    <a href="#" class="draft">下書き</a>

        <div class="chart-pitch-wrapper">
            <div class="chart">
                <canvas id="radarChart" width="200" height="200"></canvas>
            </div>

            <div class="pitch">
                <h2><span class="highlight">エレベーターピッチ</span>をお聞かせください。</h2>
                <form>
                    <ul>
                        <li>
                            <textarea id="input_pitch1" name="input_pitch1" rows="4" cols="50" placeholder="「アイデア思案の手助け」が欲しい「APPRENTICE生」向けの、
「APark」という「CGMアプリ」です。"></textarea>
                        </li>
                        <li>
                            <textarea id="input_pitch2" name="input_pitch2" rows="4" cols="50"
                                placeholder="これは「APPRENTICEのカリキュラムに沿った形式でアイデアをレーダーチャートにまとめ、先輩や後輩とアイデアを共有する」ことができます"></textarea>
                        </li>
                    </ul>
                </form>
                <h2><span class="highlight">どのように</span>解決しますか？</h2>

                <form>
                    <textarea id="input_solution" name="input_solution" rows="8" cols="50" placeholder="・レーダーチャートでアイデアを評価
各アイデアに対して1つのレーダーチャートを作成し、アイデアの強みと弱点を客観的に評価する（ChatGPT API）

・ユーザー間フォードバック機能
先輩のアイデアを参照し、過去の経験を蓄積・共有することで、新しいアイデア出しの参考にする。

・アイデアの検索
カリキュラムごとのテーマ（「自分たちの役に立つものを開発せよ」「ワクワクするものを開発せよ」「オリジナルプロダクト」）でアイデアを検索できる。"></textarea>
                </form>

            </div>
        </div>

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
    <a href="{{ route('create.feed.back', ['id' => $idea_id])}}" class="proceed_feedback_page">結果を見る</a>
    </div>
    <script src="{{ asset('js/create_radar_chart.js') }}"></script>
</body>

</html>
