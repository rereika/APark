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
</head>

<body>

    <form id="chartForm" method="POST" action="{{ route('ideas.update.chart', ['id' => $idea_id]) }}">
    @csrf
    <div class="inner">

        <h1><span class="highlight">どんなアプリ</span>を作りたいですか？</h1>

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
            <p>ストーリー性
                <select name="self_chart4">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </p>
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

        <div class="create_chart">
            <canvas id="radarChart"></canvas>
        </div>

        <div class="status">
            <ul class="pagination">
                <li class="disabled">
                    <a href="{{ route('get.select.theme', ['id' => $idea_id])}}" class="proceed_create_chart_page" id="proceedCreateChartPage">
                        <i class="fas fa-angle-left"></i>
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
                    <button type="submit" class="proceed_pitch_page" style="background: none; padding: 0; cursor: pointer;"><i class="fas fa-angle-right"></i>
                </li>
            </ul>
        </div>

    </div>

</form>

<script src="{{ asset('js/create_radar_chart.js') }}"></script>
</body>

</html>
