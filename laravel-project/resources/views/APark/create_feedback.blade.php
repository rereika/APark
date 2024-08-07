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
  <div class="back_page">
    <a href="{{ route('get.draft.to.pitch', ['id' => $idea->id]) }}" class="draft">修正する</a>
  </div>

  <div class="inner">

    <h1>カーソルを合わせるとFBが表示されます。</h1>

    <form id="feedBackChartForm">

      <input type="hidden" name="self_chart1" value="{{ $idea->self_chart1 }}">
      <input type="hidden" name="self_chart2" value="{{ $idea->self_chart2 }}">
      <input type="hidden" name="self_chart3" value="{{ $idea->self_chart3 }}">
      <input type="hidden" name="self_chart4" value="{{ $idea->self_chart4 }}">
      <input type="hidden" name="self_chart5" value="{{ $idea->self_chart5 }}">

      <input type="hidden" name="fb_chart1" value="{{ $feedback->fb_chart1 }}">
      <input type="hidden" name="fb_chart2" value="{{ $feedback->fb_chart2 }}">
      <input type="hidden" name="fb_chart3" value="{{ $feedback->fb_chart3 }}">
      <input type="hidden" name="fb_chart4" value="{{ $feedback->fb_chart4 }}">
      <input type="hidden" name="fb_chart5" value="{{ $feedback->fb_chart5 }}">

    </form>

    @if(isset($feedback))
    <p id="comment1">{{ $feedback->comment1 }}</p>
    <p id="comment2">{{ $feedback->comment2 }}</p>
    <p id="comment3">{{ $feedback->comment3 }}</p>
    <p id="comment4">{{ $feedback->comment4 }}</p>
    <p id="comment5">{{ $feedback->comment5 }}</p>
    @endif


    <div class="chart">
      <canvas id="feedBackRadarChart"></canvas>
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

      {{-- <a href="{{ route('ideas.post', ['id' => $idea_id]) }}" class="proceed_home_page">投稿する</a> --}}
      <a href="{{ route('ideas.post', ['id' => $idea->id]) }}" class="proceed_home_page">投稿する</a>

      {{-- <a href="{{ route('get.draft.to.pitch', ['id' => $idea_id]) }}" class="draft">修正する</a> --}}

        </div>
      </div>
    </div>

    <script src="{{ asset('js/create_feedback.js') }}"></script>
</body>

</html>
