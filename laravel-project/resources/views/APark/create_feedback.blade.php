<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APark</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/create_feedback.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="inner">

    <h1>クリックするとFBが表示されます。</h1>

    <div class="status">
      <img src="#" class="status_img">
      <img src="#" class="status_img">
      <img src="#" class="status_img">
      <img src="#" class="status_img">
    </div>

    <div class="next_page">
      <h2>アイデアをシェアしてさらに磨こう！</h2>
    </div>

    <div class="status">
            <ul>
            <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
            <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
            <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
            <li><img src="{{ asset('image/status1-2.png') }}" alt="ロゴ画像"></li>
            </ul>
        </div>

    <div class="next_page">
      <div class="share_or_back">
        <a href="#">投稿する</a>
        <a href="{{ route('enter.pitch')}}">修正する</a>
      </div>
    </div>

    <script src="{{ asset('js/create_radar_chart.js') }}"></script>
</body>

</html>
