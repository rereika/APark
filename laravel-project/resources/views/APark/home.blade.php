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
        <img src="{{ asset('image/logo4.png') }}" alt="ロゴ画像">
    </div>

    <div class="home-menu">
        <ul>
            <li>
                <a href="#" class="my_page" onclick="toggleAccordion(event, 'accordionMenu1')">
                    <img src="{{ asset('image/icon.png') }}" alt="アイコン画像">
                </a>

                <div id="accordionMenu1" class="accordion-content1" style="display: none;">
                    <ul>
                        <li><a href="{{ route('get.my.page')}}" class="my_page">マイページ</a></li>
                        <li><a href="{{ route('logout')}}" class="my_page">ログアウト</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="#" class="create_menu" onclick="toggleAccordion(event, 'accordionMenu2')">作成する</a>
                <div id="accordionMenu2" class="accordion-content2" style="display: none;">
                    {{-- <div class="create_menu"> --}}
                        <ul>
                            <li>
                                <form id="createIdeaForm" method="POST" action="{{ route('ideas.create') }}">
                                    @csrf
                                    <input type="submit" class="create_new_idea" value="新規作成">
                                </form>
                            </li>
                            <li><a href="{{ route('get.list.draft') }}" class="draft">下書き一覧</a></li>
                        </ul>
                    {{-- </div> --}}
                </div>
            </li>
        </ul>
    </div>

</header>

<div class="catch_copy">
    <div class="background-container">
        <img src="{{ asset('image/catch_copy.jpeg') }}" alt="キャッチコピー画像" class="background-image">
    </div>
    <p class="TextTyping">アイデアの補助輪に乗り、アプレンティスシップの旅に出よう！！</p>
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
            @foreach($ideas as $index => $idea)
                {{-- @foreach($ideas as $idea) --}}
                    <li>
                        <h1>{{ $idea->elevator1 }}</h1>
                        <div class="chart">
                            @if ($idea->feedbacks->isNotEmpty())
                                @foreach($idea->feedbacks as $feedback)

                                    <div class="image-container">
                                        <button class="modal-open js-modal-open" data-modal-id="modal-{{ $index }}">
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
                                        </button>
                                    </div>
                                @endforeach
                            @else
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

                        {{-- モーダルウィンドウ --}}
                        @foreach($ideas as $index => $idea)
                        <div class="modal js-modal" id="modal-{{ $index }}">

                            <div class="modal-container">
                                @if($idea->user_id === auth()->id())
                                    <form id="deleteForm" method="POST" action="{{ route('ideas.modal.delete') }}">
                                        @csrf
                                        <input type="hidden" name="delete[]" value="{{ $idea->id }}">
                                        <a href="#" onclick="toggleAccordion(event, 'accordionMenu3')"><span class="dli-more"></span></a>

                                        <div id="accordionMenu3" class="accordion-content3" style="display: none;">
                                            <ul>
                                                <li>
                                                <button type="button" id="delete_button_open">アイデアを削除する</button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div id="delete_alert" style="display: none;">
                                            <p>このアイデアを削除してもよろしいですか？</p>
                                            <button type="submit" id="delete_button">削除する</button>
                                            <button type="button" id="cancel_delete_button">キャンセル</button>
                                        </div>
                                    </form>
                                @endif

                                <div class="modal-close js-modal-close">×</div>
                                <div class="modal-content">
                                <p>{{ $idea->elevator1 }}</p>
                                        エレベーター1: {{ $idea->elevator1 }}<br>
                                        エレベーター2: {{ $idea->elevator2 }}<br>
                                        どうやって: {{ $idea->how }}<br>
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
                            </div>
                        </div>
                        @endforeach
    @else
        <p>アイデアはありません。</p>
    @endif
</div>

<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
