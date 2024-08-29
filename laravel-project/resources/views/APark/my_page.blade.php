<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
</head>

<body>
<div class="back_page">
        <a href="{{ route('home')}}" class="return_home">ホームへ戻る</a>
    </div>

    <div class="inner">

        <h1>マイページ</h1>

        <div class="my_idea">
            <h2>私のアイデア</h2>
            <div class="my-ideas">
                @if ($ideas->isEmpty())
                <p>アイデアがありません。</p>
                @else
                <ul>
                    @foreach ($ideas as $idea)
                        <li>
                            アイデアID: {{ $idea->id }} - テーマ: {{ $idea->theme }}<br>
                            自己チャート1: {{ $idea->self_chart1 }}<br>
                            自己チャート2: {{ $idea->self_chart2 }}<br>
                            自己チャート3: {{ $idea->self_chart3 }}<br>
                            自己チャート4: {{ $idea->self_chart4 }}<br>
                            自己チャート5: {{ $idea->self_chart5 }}<br>
                            エレベーター1: {{ $idea->elevator1 }}<br>
                            エレベーター2: {{ $idea->elevator2 }}<br>
                            どうやって: {{ $idea->how }}<br>
                            作成日時: {{ $idea->created_at }}<br>
                            更新日時: {{ $idea->updated_at }}
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="saved_ideas">
            <h2>保存したアイデア</h2>
        </div>

    </div>

</body>

</html>
