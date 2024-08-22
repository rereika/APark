<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark -それぞれがアイデアの補助輪に乗り、次なるアプレンティスシップの旅に出かけよう</title>
    <link rel="stylesheet" href="{{ asset('css/start.css') }}">
</head>
<body>
    <header>
        <div class="logo">
        <a href="{{ route('start.show') }}"><img src="{{ asset('image/logo3.png') }}" alt="ロゴ画像"></a>
        </div>
        <div class="home-menu">
            <ul>
                <li><a href="{{ route('login.show') }}">ログイン</a></li>
            </ul>
        </div>
    </header>
    <div class="catch_copy">
            <h2>APPRENTICE生が集まる公園、APark。<br>
それぞれがアイデアの補助輪に乗り、<br>次なるアプレンティスシップの旅に出かけよう。</h2>
    </div>

    <div class="main">

        <div class="whats_good_idea_section">
            <p class="whats_good_idea_title">
            <span class="good_idea">"良いアイデア"</span>
            <span class="question">に出会えてますか？</span>
            </p>

            <p class="whats_good_idea">"良いアイデア"とは、〜〜〜</p>

            <img src="{{ asset('image/good_idea_chart.png') }}" alt="レーダーチャート画像" class="radar-chart-image">
        </div>

        <div class="how_to_use_section">
            <p class="how_to_use">使い方</p>
        </div>
    </div>

    <footer></footer>
</body>
</html>
