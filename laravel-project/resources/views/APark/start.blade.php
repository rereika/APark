<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark -それぞれがアイデアの補助輪に乗り、次なるアプレンティスシップの旅に出かけよう</title>
    <link rel="stylesheet" href="{{ asset('css/start.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400&family=Patrick+Hand:wght@400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <div class="logo">
        <a href="{{ route('start.show') }}"><img src="{{ asset('image/logo4.png') }}" alt="ロゴ画像"></a>
        </div>
        <div class="home-menu">
            <ul>
                <li><a href="{{ route('login') }}">ログイン</a></li>
            </ul>
        </div>
    </header>

    <div class="catch_copy">
        <div class="catch_copy_text">
            <p class="TextTyping">APPRENTICE生専用<br> アイデア補助輪アプリ</p>
            <img src="{{ asset('image/logo4.png') }}" alt="ロゴ画像">

            <div class="catch_copy_btn">
                <a href="#" id="about_apark">AParkとは？</a>
                <a href="#" id="how_to_use">使い方</a>
            </div>

        </div>


        <div class="catch_copy_img">
            <img src="{{ asset('image/app_image.png') }}" alt="アプリイメージ画像">
        </div>

    </div>

    <div class="main">

        <div class="whats_good_idea_section" id="whats_good_idea_section">

            <div class="whats_good_idea_section1">
                <p class="whats_good_idea_title">
                    <span class="good_idea">"良いアイデア"</span>
                    <span class="question">に出会えてますか？</span>
                </p>

                <div class="whats_good_idea_message">

                    <p class="whats_good_idea">　初めまして！APPRENTICE 5期生の大嶽です。<br>早速ですが、皆さんはチーム開発やオリジナルプロダクトにおいて、<span class="bold">良いアイデア</span>に出会えていますか？<br>このアプリは、私自身が<span class="bold">良いアイデア</span>に悩んだ実体験から生まれました。<br><br>　APPRENTICE生のような開発未経験者にとって、突然「良いアイデアを出しましょう！」と言われても、すぐに思いつくのは難しく、苦労することが多いと言われています。<br>　それは、「良いアイデア」を出すには、<span class="red">単なるひらめきだけでなくさまざまな要素を考慮しなければならない</span>からです。<br>既存のアプリとの差別化や実現可能性、さらにはモチベーションを維持するための工夫など、多面的な視点が求められます。実際に私も「右も左もわからないのに最初（アイデア出し）でつまずいたら終わり！？」という不安に悩まされました。<br><br>　この経験から、アイデアを分析・可視化し、AIからフィードバックをもらいつつ、先輩や後輩のアイデアも参考にできるというアベンジャーズのような場を提供したいと考え、このアプリを開発しました！笑<br><br>　アイデア出しでつまずくと先に進めず、楽しくない開発はストレスとなり、ユーザーがつかないアイデアはドラフト指名を得られません。<br>　AParkは、子供が補助輪を使って自転車に乗るように、アイデア出しをしっかりサポートします！
                    </p>
                </div>
            </div>

            <div class="whats_good_idea_section2">
                <p class="creator">APPRENTICE 5期生 大嶽伶果</p>
                <img src="{{ asset('image/ootake.JPG') }}" alt="おおたけアイコン">
            </div>

        </div>

        <div class="good_idea_circle">
            <div class="circle">
                <div class="content top"><img src="{{ asset('image/good_idea1.png') }}"></div>
                <div class="content right"><img src="{{ asset('image/good_idea3.png') }}"></div>
                <div class="content bottom_right"><img src="{{ asset('image/good_idea2.png') }}"></div>
                <div class="content bottom_left"><img src="{{ asset('image/good_idea4.png') }}"></div>
                <div class="content left"><img src="{{ asset('image/good_idea5.png') }}"></div>
            </div>
        </div>

        <div class="how_to_use_section" id="how_to_use_section">
            <div class="how_to_use">
                <p>使い方</p>
            </div>

            <ul class="list-2">

            <!-- <p class="how_to_use_main_title">アイデアを作成する</p> -->

            <div class="mockup">
                <img src="{{ asset('image/mockup2.png') }}" alt="モックアップ">
            </div>

                    <hr class="dotted-line">

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">テーマの選択</p>
                            </li>
                            <p class="">まずは、作成したいアイデアのテーマを選びましょう。<br>選んだテーマに基づいて、AIがアドバイスを提供します。</p>
                        </div>
                        <img src="{{ asset('image/how_to1.png') }}" alt="使い方画像1" class="how_to1">
                    </div>

                    <hr class="dotted-line">

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">目標の設定</p>
                            </li>
                            <p class="">「こんなプロダクトを作りたい！」と思えるゴールを5段階で設定します。<br>目標を明確にすることが成功の第一歩です。<br>全て5が良いアイデアなわけではなく、思いを乗せて設定することがベストです！</p>
                        </div>
                        <img src="{{ asset('image/how_to2.png') }}" alt="使い方画像2" class="how_to1">
                    </div>

                    <hr class="dotted-line">

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">アイデアの分析</p>
                            </li>
                            <p class="">アプリの説明をAIに渡します。<br>この情報をもとに、アイデアが分析されます。</p>
                        </div>
                        <img src="{{ asset('image/how_to3.png') }}" alt="使い方画像3" class="how_to1">
                    </div>

                    <hr class="dotted-line">

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">現状の把握</p>
                            </li>
                            <p class="">AIからのフィードバックが返ってきます。<br>改善が必要な点が見つかった場合は、前のページに戻ってアイデアを再考しましょう。<br>時間を置いて考えたい場合は、下書き保存もできます。</p>
                        </div>
                        <img src="{{ asset('image/how_to4.png') }}" alt="使い方画像4" class="how_to1">
                    </div>

                    <hr class="dotted-line">

                    <div class="how_to_use_sub_section">
                        <div class="how_to_use_text_section">
                            <li>
                                <p class="how_to_use_title">アイデアをシェア</p>
                            </li>
                            <p class="">アイデアが完成したら投稿しましょう。<br>他の人とアイデアを共有することでさらに磨きをかけることができます。</p>
                        </div>
                        <img src="{{ asset('image/how_to5.png') }}" alt="使い方画像5" class="how_to1">
                    </div>

                    <hr class="dotted-line">

                </ul>
            </div>
    </div>

    <footer>
        <ul>
            <li><a href="{{ route('login') }}">ログイン</a></li>
        </ul>
    </footer>
    <script src="{{ asset('js/start.js') }}"></script>
</body>
</html>
