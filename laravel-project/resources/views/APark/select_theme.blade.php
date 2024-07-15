<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select_theme.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" rel="stylesheet">
</head>

<body>

    <div class="back_page">
        <a href="{{ route('home')}}" class="back_home_btn" onclick="return notDraftMessage(event)">ホームへ戻る</a>
    </div>

    <div class="inner">

    {{-- <a href="{{ route('ideas.show.draft', ['id' => $idea_id]) }}" class="draft">下書き</a> --}}

        <h1>今回の<span class="highlight">テーマ</span>は何ですか？</h1>

        <form id="themeForm" method="POST" action="{{ route('ideas.update.theme', ['id' => $idea_id]) }}">
    @csrf
    <button type="button" class="choice" data-theme="自分たちの役に立つものを開発せよ">「自分たちの役に立つものを開発せよ」</button>
    <button type="button" class="choice" data-theme="ワクワクするものを開発せよ">「ワクワクするものを開発せよ」</button>
    <button type="button" class="choice" data-theme="オリジナルプロダクト">オリジナルプロダクト</button>
    <input type="hidden" name="theme" id="themeInput">
        </form>

        <div class="status">
            <ul class="pagination">
                <li class="disabled">
                    <a href="#"><i class="fas fa-angle-left"></i></a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                <li>
                    <a href="#">4</a></li>
                    <li class="disabled">
                    <a href="{{ route('get.create.radar.chart', ['id' => $idea_id])}}" class="proceed_create_chart_page" id="proceedCreateChartPage"><i class="fas fa-angle-right"></i></a>
                </li>
            </ul>
        </div>

    </div>
    {{-- <div class="next_page">
    <a href="{{ route('get.create.radar.chart', ['id' => $idea_id])}}" class="proceed_create_chart_page" id="proceedCreateChartPage">次へ</a>
    </div> --}}


    <script src="{{ asset('js/select_theme.js') }}"></script>
</body>

</html>
