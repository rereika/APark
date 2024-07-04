<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select_theme.css') }}">
</head>

<body>

    <div class="back_page">
        <a href="{{ route('home')}}" class="back_home_btn">一覧へ</a>
    </div>

    <div class="inner">
        <h1>今回の<span class="highlight">テーマ</span>は何ですか？</h1>

        <form id="themeForm" method="POST" action="{{ route('store.theme') }}">
        @csrf
            <button type="button" class="choice" data-theme="1">「自分たちの役に立つものを開発せよ」</button>
            <button type="button" class="choice" data-theme="2">「ワクワクするものを開発せよ」</button>
            <button type="button" class="choice" data-theme="3">オリジナルプロダクト</button>
            <input type="hidden" name="theme" id="themeInput">
        </form>

        <div class="status">
            <p>1</p>
            <p>2</p>
            <p>3</p>
            <p>4</p>
        </div>
    </div>
    <div class="next_page">
    <a href="{{ route('create.radar.chart')}}" class="proceed_create_chart_page" id="proceedCreateChartPage">次へ</a>
    </div>


    <script src="{{ asset('js/select_theme.js') }}"></script>
</body>

</html>
