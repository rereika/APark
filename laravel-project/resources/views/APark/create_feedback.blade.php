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

    {{-- <h1><span>青グラフ</span>をタップするとコメントが見れます。</h1> --}}
    <h1>現在のアイデアはこちら！</h1>

    <form id="feedBackChartForm">

      <input type="hidden" name="self_chart1" value="{{ $idea->self_chart1 }}">
      <input type="hidden" name="self_chart2" value="{{ $idea->self_chart2 }}">
      <input type="hidden" name="self_chart3" value="{{ $idea->self_chart3 }}">
      <input type="hidden" name="self_chart4" value="{{ $idea->self_chart4 }}">
      <input type="hidden" name="self_chart5" value="{{ $idea->self_chart5 }}">

      <!-- <input type="hidden" name="fb_chart1" value="{{ $feedback['fb_chart1'] }}">
      <input type="hidden" name="fb_chart1" value="{{ $feedback['fb_chart2'] }}">
      <input type="hidden" name="fb_chart1" value="{{ $feedback['fb_chart3'] }}">
      <input type="hidden" name="fb_chart1" value="{{ $feedback['fb_chart4'] }}">
      <input type="hidden" name="fb_chart1" value="{{ $feedback['fb_chart5'] }}"> -->

      <input type="hidden" name="fb_chart1" value="{{ $feedback->fb_chart1 }}">
      <input type="hidden" name="fb_chart2" value="{{ $feedback->fb_chart2 }}">
      <input type="hidden" name="fb_chart3" value="{{ $feedback->fb_chart3 }}">
      <input type="hidden" name="fb_chart4" value="{{ $feedback->fb_chart4 }}">
      <input type="hidden" name="fb_chart5" value="{{ $feedback->fb_chart5 }}">

    </form>

    <div class="chart">
      <canvas id="feedBackRadarChart"></canvas>
    </div>

  <div class="comment">
  @if(isset($feedback))

    <!-- <p id="comment1">{{ $feedback['comment1'] }}</p>
    <p id="comment1">{{ $feedback['comment2'] }}</p>
    <p id="comment1">{{ $feedback['comment3'] }}</p>
    <p id="comment1">{{ $feedback['comment4'] }}</p>
    <p id="comment1">{{ $feedback['comment5'] }}</p> -->


    <span class="fb_item">類いない</span><p class="yazirusi"></p><br>
    <p class="comment1">{{ $feedback->comment1 }}</p>

    <span class="fb_item">使用技術の正確性</span><p class="yazirusi"></p><br>
    <p class="comment2">{{ $feedback->comment2 }}</p>

    <span class="fb_item">目新しさ</span><p class="yazirusi"></p><br>
    <p class="comment3">{{ $feedback->comment3 }}</p>

    <span class="fb_item">ストーリー性</span><p class="yazirusi"></p><br>
    <p class="comment4">{{ $feedback->comment4 }}</p>

    <span class="fb_item">わくわく</span><p class="yazirusi"></p><br>
    <p class="comment5">{{ $feedback->comment5 }}</p>
    @endif

    </div>





    <div class="status">
        {{-- <a href="{{ route('get.draft.to.pitch', ['id' => $idea->id]) }}" class="draft">修正する</a> --}}

      <ul class="pagination">
        <li class="disabled">
          <a href="{{ route('get.draft.to.pitch', ['id' => $idea->id]) }}" class="draft">修正する</a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li class="active"><a href="#">4</a></li>
        <li class="disabled">
        <a href="{{ route('ideas.post', ['id' => $idea->id]) }}" class="proceed_home_page">投稿する</a>
        </li>
      </ul>

      {{-- <div class="share_btn">
        <a href="{{ route('ideas.post', ['id' => $idea->id]) }}" class="proceed_home_page">投稿する</a>
      </div> --}}

    </div>

    <!-- <div class="next_page">
    <a href="{{ route('get.draft.to.pitch', ['id' => $idea->id]) }}" class="draft">修正する</a>
    <a href="{{ route('ideas.post', ['id' => $idea->id]) }}" class="proceed_home_page">投稿する</a>
  </div> -->

    </div>
  </div>




    <script src="{{ asset('js/create_feedback.js') }}"></script>
</body>

</html>
