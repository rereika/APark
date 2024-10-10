<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_radar_chart.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>

    {{-- <div class="back_page">
        <a href="{{ route('get.select.theme', ['id' => $idea_id])}}" class="back_home_btn" id="proceedCreateChartPage">戻る</a>
    </div> --}}

    <form id="chartForm" method="POST" action="{{ route('ideas.update.chart', ['id' => $idea_id]) }}">
    @csrf
    <div class="inner">

        <h1><span class="highlight">どんなアプリ</span>を作りたいですか？</h1>

        <p class="theme">今回のテーマ：
            <span>@switch($theme)
                @case(1)
                    「自分たちの役に立つものを開発せよ」
                    @break
                @case(2)
                    「ワクワクするものを開発せよ」
                    @break
                @case(3)
                    オリジナルプロダクト
                    @break
            @endswitch
            </span>
        </p>

        <div class="chart_form">

            <p>類ない
                <select name="self_chart1">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </p>
            <p>使用技術の正確性
                <select name="self_chart2">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </p>

            <p>目新しさ
                <select name="self_chart3">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </p>

            <div class="story">
                <p>ストーリー性
                    <select name="self_chart4">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <a href="#" id="openModal">ストーリー性とは？</a>
            </div>
            <!-- <p> -->
                <!-- <a href="#" id="openModal">ストーリー性とは？</a>
            </p> -->

            <p>わくわく
                <select name="self_chart5">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </p>

            <input type="hidden" name="idea_id" value="{{ $idea_id }}">

        </div>

        {{-- <a href="#" id="openModal">ストーリー性とは？</a> --}}

        {{-- モーダルウィンドウ --}}
        <section id="modalArea" class="modalArea">
        <div id="modalBg" class="modalBg"></div>
        <div class="modalWrapper">
            <div class="modalContents">
            <p>マイページの、<span>「Why engineer」</span>を入力すると、<br><span>ストーリー性</span>の値が正確になります！</p>
            <img src="{{ asset('image/why_engineer.png') }}" alt="ロゴ画像">
            <div class="my_page">
                <a href="{{ route('get.my.page')}}">Why engineerを書く</a>
            </div>
            </div>
            <div id="closeModal" class="closeModal">
            ×
            </div>
        </div>
        </section>

        <div class="create_chart">
            <canvas id="radarChart"></canvas>
        </div>

        <div class="status">
            <ul class="pagination">
                <li class="disabled">
                    <a href="{{ route('get.select.theme', ['id' => $idea_id])}}" class="proceed_create_chart_page" id="proceedCreateChartPage"><i class="fas fa-angle-left"></i>&nbsp;&nbsp;&nbsp;戻る
                    </a>
                </li>
                <li>
                    <a href="#">1</a>
                </li>
                <li class="active">
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li class="disabled">
                    <button type="submit" class="proceed_pitch_page" style="background: none; padding: 0; cursor: pointer;">次へ&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-right"></i>
                </li>
            </ul>
        </div>

    </div>

</form>

<script src="{{ asset('js/create_radar_chart.js') }}"></script>
</body>

</html>
