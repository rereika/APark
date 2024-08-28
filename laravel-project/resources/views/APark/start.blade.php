<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark -それぞれがアイデアの補助輪に乗り、次なるアプレンティスシップの旅に出かけよう</title>
    <link rel="stylesheet" href="{{ asset('css/start.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <p class="TextTyping">APPRENTICE生が集まる公園、APark。
それぞれがアイデアの補助輪に乗り、
次なるアプレンティスシップの旅に出かけよう。</p>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/8-10/js/8-10.js"></script>
        <img src="{{ asset('image/app_image.png') }}" alt="アプリイメージ画像" class="app-image">
    </div>

    <div class="main">

        <div class="whats_good_idea_section">
            <p class="whats_good_idea_title">
            <span class="good_idea">"良いアイデア"</span>
            <span class="question">に出会えてますか？</span>
            </p>

            <p class="whats_good_idea">プロダクト制作において"良いアイデア"を出すには、他アプリとの差別化や、自分の技術で実現可能かなど、多くの要素を考慮する必要があります。<br>それもそのはず、今自分に必要なものだけで考えると、"ただのアイデア"になってしまうからです。<br><br>しかし、初学者にとって、「さあ、アイデアを出しましょう！」と言われても、すぐには思いつかず、困難を感じることが多いと言われています。<br>実際に私も「右も左もわからないのに最初（アイデア出し）につまずいたら終わり！？」という不安に悩まされました。<br><br>この経験から、アイデアを分析・可視化し、フィードバックを提供し、先輩や後輩のアイデアも参考にできる場エオ提供してくれるアプリを作りたいと思いました。<br>プロダクト作りで最も大切なのは、優れたアイデアを生み出すことです。<br>AParkは、子供が補助輪を使って自転車に乗るように、アイデア出しをしっかりサポートします！</p>
            <img src="{{ asset('image/good_idea_chart.png') }}" alt="レーダーチャート画像" class="radar-chart-image">
        </div>

        <div class="how_to_use_section">
            <p class="how_to_use">使い方</p>

            <ul class="list-2">

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">テーマの選択</p>
                            </li>
                            <p class="">今回のテーマを選びましょう。<br>選んだテーマに基づいて、AIがアドバイスを提供します。</p>
                        </div>
                        <img src="{{ asset('image/how_to1.png') }}" alt="使い方画像1" class="how_to1">
                    </div>

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">目標の設定</p>
                            </li>
                            <p class="">「こんなプロダクトを作りたい！」と思えるゴールを設定しましょう。<br>目標を明確にすることが成功の第一歩です。</p>
                        </div>
                        <img src="{{ asset('image/how_to2.png') }}" alt="使い方画像2" class="how_to1">
                    </div>

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">アイデアの分析</p>
                            </li>
                            <p class="">エレベーターピッチとプロダクトの機能をAIに入力します。<br>この情報をもとに、AIがアイデアを分析し、良い点や改善できる点についてフィードバックを提供します。<br>「エレベーターピッチって何？」という方は、この機会に調べてみましょう！</p>
                        </div>
                        <img src="{{ asset('image/how_to3.png') }}" alt="使い方画像3" class="how_to1">
                    </div>

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">現状の把握</p>
                            </li>
                            <p class="">AIからのフィードバックを確認します。<br>改善が必要な点が見つかった場合は、前のページに戻ってアイデアを再考しましょう。<br>時間を置いて考えたい場合は、下書き保存を活用しましょう。</p>
                        </div>
                        <img src="{{ asset('image/how_to4.png') }}" alt="使い方画像4" class="how_to1">
                    </div>

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">アイデアをシェア</p>
                            </li>
                            <p class="">アイデアが完成したら投稿しましょう。<br>他の人とアイデアを共有することでさらに磨きをかけることができます。</p>
                        </div>
                        <img src="{{ asset('image/how_to4.png') }}" alt="使い方画像5" class="how_to1">
                    </div>

                </div>
                </div>
            </ul>
        </div>

    </div>

    <footer></footer>
    <script src="{{ asset('js/start.js') }}"></script>
</body>
</html>
