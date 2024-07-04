<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_radar_chart.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="back_page">
    <a href="{{ route('select.theme')}}" class="return_theme_page">一つ戻る</a>
    </div>

    <div class="inner">

        <h1><span class="highlight">どんなアプリ</span>を作りたいですか？</h1>

        <div class="chart_form">
            <form id="chartForm" method="POST" action="{{ route('store.self.chart') }}">
            @csrf
                <p>類ない
                    <select name="chart_form1">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <p>使用技術の正確性
                    <select name="chart_form2">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <p>目新しさ
                    <select name="chart_form3">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <p>ストーリー性
                    <select name="chart_form4">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <p>わくわく
                    <select name="chart_form5">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </p>
                <input type="hidden" name="self-made-chart" id="chartInput">
            </form>
        </div>


        <div class="create_chart">
            <canvas id="radarChart"></canvas>
        </div>

        <div class="status">
            <img src="#" class="status_img">
            <img src="#" class="status_img">
            <img src="#" class="status_img">
            <img src="#" class="status_img">
        </div>


    </div>

    <div class="next_page">
    <a href="{{ route('enter.pitch')}}" class="proceed_pitch_page" id="proceedPitchPage">次へ</a>
    </div>

    <script src="{{ asset('js/create_radar_chart.js') }}"></script>
</body>

</html>
