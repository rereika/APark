<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/enter_pitch.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--==============ロード画面のJQuery読み込み===============-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js"></script>
<!--IE11用※対応しなければ削除してください-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
<!--自作のJS-->
<script src="js/load.js"></script>
<!--==============END ロード画面のJQuery読み込み===============-->
</head>

<body>
    <form id="chartForm" method="POST" action="{{ route('generateAndRedirect', ['id' => $idea->id]) }}">
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
                    <h2>このアプリの<span class="highlight">キャッチコピー</span>は？</h2>
                    <!-- <ul>
                        <li> -->
                            <div class="TextareaWrapper">
                                <textarea id="input_pitch1" name="elevator1" rows="4" cols="50" maxlength="60" placeholder="アプレンティス生が集まる公園、APark。それぞれがアイデアの補助輪に乗り、次なるアプレンティスシップの旅に出かけよう！">{{ $idea->elevator1 ?? '' }}</textarea>
                                <div class="CharCounter" id="charCounter1"></div>
                            </div>
                        <!-- </li>
                        <li> -->
                    <h2><span class="highlight">誰のどんな課題</span>を解決しますか？</h2>
                            <div class="TextareaWrapper">
                                <textarea id="input_pitch2" name="elevator2" rows="4" cols="50" maxlength="60" placeholder="プログラミング初学者が、良いアイデアを形にする際の困難を解決する。">{{ $idea->elevator2 ?? '' }}</textarea>
                                <div class="CharCounter" id="charCounter2"></div>
                            </div>
                        <!-- </li>
                    </ul> -->
                    <h2>主な<span class="highlight">機能</span>はなんですか？</h2>
                        <div class="TextareaWrapper">
                            <textarea id="input_solution" name="how" rows="8" cols="50" maxlength="250" placeholder="・レーダーチャートでアイデアを評価 各アイデアに対して1つのレーダーチャートを作成し、アイデアの強みと弱点を客観的に評価する（ChatGPT API）...">{{ $idea->how ?? '' }}</textarea>
                            <div class="CharCounter" id="charCounter3"></div>
                        </div>
                </div>

            </div>
            <input type="hidden" name="idea_id" value="{{ $idea->id }}">

            <div class="status">
                <ul class="pagination">
                    <li class="disabled">
                        <button type="submit" class="return_page" name="action" value="return_page">
                        <i class="fas fa-angle-left"></i>&nbsp;&nbsp;&nbsp;戻る</button>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li class="active">
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li class="disabled">
                        <input type="hidden" name="proceed" value="true">
                        <button type="button" class="proceed" name="action" value="proceed">
                        次へ&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-right"></i>
                        </button>
                    </li>
                </ul>
            </div>

            <div class="next_page">
                <button type="submit" class="draft" name="action" value="draft">下書き保存</button>
            <button type="submit" class="delete" name="action" value="delete">削除する</button>
            </div>


        </div>

    </form>

    {{-- ロード画面 --}}
    <div id="page_loading">
        <div id="load_area">
            <div class="loader">Loading...</div>
            <div id="page_loading_text"></div>
            <p class="load_p">
                <span class="load_h">
                    フィードバックを作成中…
                </span>
                ページの表示までに数秒お時間<br class="load_spbr">いただく場合がございます。
            </p>
        </div>
    </div>

    <script src="{{ asset('js/enter_pitch.js') }}"></script>
</body>

</html>
