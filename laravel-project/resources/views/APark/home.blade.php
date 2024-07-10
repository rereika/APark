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
        <li>
          <a href="{{ route('get.my.page')}}" class="my_page">マイページ</a></li>
        <li>
    <form id="createIdeaForm" method="POST" action="{{ route('ideas.create') }}" style="display: none;">
        @csrf
    </form>
    <a href="#" class="home_menu_2" onclick="document.getElementById('createIdeaForm').submit(); return false;">作成する</a>
</li>

      </ul>
    </div>

  </header>

  <div class="catch_copy">
  <img src="{{ asset('image/catch_copy.jpeg') }}" alt="キャッチコピー画像">
    <p>アイデアの補助輪に乗り、<br>アプレンティスシップの旅に出よう！！</p>
  </div>


  <div class="main-contents">
    <div class="new-ideas-box-animate">
      <ul class="slider">
        @foreach($ideas as $idea)
          <li>
          <a href="{{ route('home', ['id' => $idea->id]) }}" class="preview-link">
            <h1>{{ $idea->elevator1 }}</h1>
            </a>
            <img src="{{ asset('image/sample_chart.png') }}" alt="サンプルチャート画像">
          </li>
        @endforeach
      </ul>
    </div>

    <div class="sort-by-theme">
        <button type="button" class="theme-button">チーム開発 DEV1</button>
        <button type="button" class="theme-button">オリジナルプロダクト</button>
        <button type="button" class="theme-button">チーム開発 DEV2</button>
    </div>

    <div class="idea-preview">
    </div>

    </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-6/js/6-1-6.js"></script>

</body>

</html>
