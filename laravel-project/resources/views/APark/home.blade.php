<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/css/6-1-6.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
<header>
    <div class="logo">
        <img src="{{ asset('image/logo3.png') }}" alt="ロゴ画像">
    </div>
    <div class="home-menu">
        <ul>
            <li><a href="{{ route('get.my.page')}}" class="my_page">マイページ</a></li>
            <li>
                <a href="#" class="home_menu_2" onclick="toggleAccordion(event)">作成する</a>
                <div id="accordionMenu" class="accordion-content" style="display: none;">
                    <div class="create_menu">
                        <ul>
                            <li>
                                <form id="createIdeaForm" method="POST" action="{{ route('ideas.create') }}">
                                    @csrf
                                    <input type="submit" class="home_menu_2" value="新規作成">
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('get.list.draft') }}" class="draft">下書き一覧</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>

<div class="catch_copy">
    <img src="{{ asset('image/catch_copy.jpeg') }}" alt="キャッチコピー画像">
    <p class="TextTyping">アイデアの補助輪に乗り、<br>アプレンティスシップの旅に出よう！！</p>
</div>

<div class="main-contents">
    <div class="new-ideas-box-animate">
        <ul class="slider">
            @foreach($ideas as $idea)
                <li>
                    <a href="{{ route('home', ['id' => $idea->id]) }}" class="preview-link">
                        <h1>{{ $idea->elevator1 }}</h1>
                    </a>
                    <div class="chart">
                        <canvas id="feedBackRadarChart"></canvas>
                    </div>

                    @if($idea->feedbacks->isNotEmpty())
                    @foreach($idea->feedbacks as $feedback)

                    <form id="feedBackChartForm">

                        <input type="hidden" name="self_chart1" value="{{ $idea->self_chart1 }}">
                        <input type="hidden" name="self_chart2" value="{{ $idea->self_chart2 }}">
                        <input type="hidden" name="self_chart3" value="{{ $idea->self_chart3 }}">
                        <input type="hidden" name="self_chart4" value="{{ $idea->self_chart4 }}">
                        <input type="hidden" name="self_chart5" value="{{ $idea->self_chart5 }}">

                        <input type="hidden" name="fb_chart1" value="{{ $feedback->fb_chart1 }}">
                        <input type="hidden" name="fb_chart2" value="{{ $feedback->fb_chart2 }}">
                        <input type="hidden" name="fb_chart3" value="{{ $feedback->fb_chart3 }}">
                        <input type="hidden" name="fb_chart4" value="{{ $feedback->fb_chart4 }}">
                        <input type="hidden" name="fb_chart5" value="{{ $feedback->fb_chart5 }}">

                    </form>
                    @endforeach
                    @endif

                    {{-- <img src="{{ asset('image/sample_chart.png') }}" alt="サンプルチャート画像"> --}}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="sort-by-theme">
        <button type="button" class="theme-button">チーム開発 DEV1</button>
        <button type="button" class="theme-button">オリジナルプロダクト</button>
        <button type="button" class="theme-button">チーム開発 DEV2</button>
    </div>

    <div class="idea-preview"></div>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/js/6-1-6.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/create_feedback.js') }}"></script>
</body>
</html>
