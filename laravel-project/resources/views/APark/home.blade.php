<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APark</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

  <header>
    <div class="icon">
    <img src="{{ asset('image/logo.png') }}" alt="ロゴ画像">
    </div>

    <a href="#" class="my_page">マイページ</a>
    <a href="#" class="create_idea">作成する</a>
  </header>

  <div class="catch_copy">
    <img src="" alt="">
  </div>

  <div class="inner">

  <div class="sort_bytheme">
    <p>テーマで並び替える</p>
      <button type="button" class="">チーム開発 DEV1</button>
      <button type="button" class="">オリジナルプロダクト</button>
      <button type="button" class="">チーム開発 DEV2</button>
  </div>

    <p>新着のアイデア</p>
    <div class="new_posts"></div>
  </div>
</body>

</html>
