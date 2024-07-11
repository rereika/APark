<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select_theme.css') }}">
</head>

<body>

    <div class="back_page">
        <a href="{{ route('home')}}" class="back_home_btn">ホームへ戻る</a>
    </div>

    <div class="inner">

    <a href="{{ route('ideas.show.draft', ['id' => $idea_id]) }}" class="draft">下書き</a>

        <h1>今回の<span class="highlight">テーマ</span>は何ですか？</h1>

        <form id="themeForm" method="POST" action="{{ route('ideas.update.theme', ['id' => $idea_id]) }}">
    @csrf
    <button type="button" class="choice" data-theme="自分たちの役に立つものを開発せよ">「自分たちの役に立つものを開発せよ」</button>
    <button type="button" class="choice" data-theme="ワクワクするものを開発せよ">「ワクワクするものを開発せよ」</button>
    <button type="button" class="choice" data-theme="オリジナルプロダクト">オリジナルプロダクト</button>
    <input type="hidden" name="theme" id="themeInput">
        </form>

        <div class="status">
            <ul>
            <li><img src="{{ asset('image/status1-1.png') }}" alt="ロゴ画像"></li>
            <li><img src="{{ asset('image/status2-2.png') }}" alt="ロゴ画像"></li>
            <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
            <li><img src="{{ asset('image/status4-2.png') }}" alt="ロゴ画像"></li>
            </ul>
        </div>
    </div>
    <div class="next_page">
    <a href="{{ route('get.create.radar.chart', ['id' => $idea_id])}}" class="proceed_create_chart_page" id="proceedCreateChartPage">次へ</a>
    </div>


    <script src="{{ asset('js/select_theme.js') }}"></script>
</body>

</html>
