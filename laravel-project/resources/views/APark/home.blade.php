<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/css/6-1-6.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="background-container">
        <img src="{{ asset('image/catch_copy.jpeg') }}" alt="キャッチコピー画像" class="background-image">
    </div>
    <p class="TextTyping">アイデアの補助輪に乗り、
アプレンティスシップの旅に出よう！！</p>
</div>

<div class="main-contents">

    <p class="theme_select_title">最新のアイデア</p>
    <form action="{{ route('themeRankList') }}" method="GET">
    <label class="theme_select">
        <select name="theme_rank" onchange="this.form.submit()">
            <option value="">全て</option>
            <option value="theme1" {{ request('theme_rank') == 'theme1' ? 'selected' : '' }}>チーム開発 DEV1</option>
            <option value="theme2" {{ request('theme_rank') == 'theme2' ? 'selected' : '' }}>オリジナルプロダクト</option>
            <option value="theme3" {{ request('theme_rank') == 'theme3' ? 'selected' : '' }}>チーム開発 DEV2</option>
        </select>
    </label>
</form>


    @if($ideas->isNotEmpty())
        <div class="new-ideas-box-animate">
            <ul class="slider">
                @foreach($ideas as $idea)
                    <li>
                        {{-- <a href="{{ route('home', ['id' => $idea->id]) }}" class="preview-link"> --}}
                            <h1>{{ $idea->elevator1 }}</h1>
                        {{-- </a> --}}

                        <div class="chart">
                            @if ($idea->feedbacks->isNotEmpty())
                                @foreach($idea->feedbacks as $feedback)
                                <div class="image-container">
                                <button class="modal-open js-modal-open">
                                    <canvas class="feedBackRadarChart"
                                        data-self-chart1="{{ $idea->self_chart1 }}"
                                        data-self-chart2="{{ $idea->self_chart2 }}"
                                        data-self-chart3="{{ $idea->self_chart3 }}"
                                        data-self-chart4="{{ $idea->self_chart4 }}"
                                        data-self-chart5="{{ $idea->self_chart5 }}"
                                        data-fb-chart1="{{ $feedback->fb_chart1 }}"
                                        data-fb-chart2="{{ $feedback->fb_chart2 }}"
                                        data-fb-chart3="{{ $feedback->fb_chart3 }}"
                                        data-fb-chart4="{{ $feedback->fb_chart4 }}"
                                        data-fb-chart5="{{ $feedback->fb_chart5 }}">
                                    </canvas>
                                </div>
                                @endforeach
                            @else
                            <div class="image-container">
                                <canvas class="feedBackRadarChart"
                                    data-self-chart1="{{ $idea->self_chart1 }}"
                                    data-self-chart2="{{ $idea->self_chart2 }}"
                                    data-self-chart3="{{ $idea->self_chart3 }}"
                                    data-self-chart4="{{ $idea->self_chart4 }}"
                                    data-self-chart5="{{ $idea->self_chart5 }}"
                                    data-fb-chart1="0"
                                    data-fb-chart2="0"
                                    data-fb-chart3="0"
                                    data-fb-chart4="0"
                                    data-fb-chart5="0">
                                </canvas>
                            </div>
                        </button>
                            @endif
                        </div>

                        <!-- モーダル本体 -->
                        <div class="modal js-modal">
                            <div class="modal-container">
                                <div class="modal-close js-modal-close">×</div>
                                <div class="modal-content">
                                    <p>{{ $idea->elevator1 }}</p>
                                </div>
                            </div>
                        </div>
                    </li>

                @endforeach
            </ul>
        </div>
    @else
        <p>アイデアはありません。</p>
    @endif








</div>

<script src="{{ asset('js/home.js') }}"></script>
{{-- <script src="{{ asset('js/create_feedback.js') }}"></script> --}}
</body>
</html>
