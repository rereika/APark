<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
<!-- jQueryの読み込み -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick CarouselのCSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">

<!-- Slick CarouselのJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

</head>

<body>
<div class="back_page">
    <a href="{{ route('home')}}" class="return_home">ホームへ戻る</a>
</div>

<div class="inner">

    <h1>マイページ</h1>

    <div class="my_page_items">

        <div class="my_ideas">
            <h2>私のアイデア</h2>
            <div class="my-ideas-items">
                @if ($ideas->isEmpty())
                <p>アイデアがありません。</p>
                @else
                <div class="new-ideas-box-animate">
                    <ul class="slider">
                {{-- <ul> --}}
                    @foreach ($ideas as $idea)
                        <li>
                            <form id="deleteForm" method="POST" action="{{ route('ideas.myPage.delete') }}">
                            @csrf
                                <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                                <button type="button" id="delete_button_open">アイデアを削除する</button>
                                <div id="delete_alert" style="display: none;">
                                    <p>このアイデアを削除してもよろしいですか？</p>
                                    <button type="submit" id="delete_button">削除する</button>
                                    <button type="button" id="cancel_delete_button">キャンセル</button>
                                </div>
                            </form>
                            {{-- 自己チャート1: {{ $idea->self_chart1 }}<br>
                            自己チャート2: {{ $idea->self_chart2 }}<br>
                            自己チャート3: {{ $idea->self_chart3 }}<br>
                            自己チャート4: {{ $idea->self_chart4 }}<br>
                            自己チャート5: {{ $idea->self_chart5 }}<br> --}}
                            {{-- <span>テーマ:</span> --}}
                                @switch($idea->theme)
                                    @case(1)
                                        <span class="theme">「自分たちの役に立つものを開発せよ」</span>
                                        @break
                                    @case(2)
                                    <span class="theme">「ワクワクするものを開発せよ」</span>
                                        @break
                                    @case(3)
                                    <span class="theme">オリジナルプロダクト</span>
                                        @break
                                    @default
                                        未定
                                @endswitch
                                <br>
                            <span>エレベーターピッチ:</span><br>{{ $idea->elevator1 }}<br><p class="txt-limit">{{ $idea->elevator2 }}</p><br>
                            <span>解決方法:</span><br><p class="txt-limit">{{ $idea->how }}</p><br>
                            {{ $idea->created_at }}<br>
                            {{-- 更新日時: {{ $idea->updated_at }} --}}
                        </li>
                    @endforeach
                {{-- </ul> --}}
                </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="saved_ideas">
            <h2>保存したアイデア</h2>
        </div>

    </div>

</div>

<script src="{{ asset('js/my_page.js') }}"></script>
</body>

</html>
