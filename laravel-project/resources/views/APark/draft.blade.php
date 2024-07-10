<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/draft.css') }}">
</head>

<body>
<div class="back_page">

<a href="{{ route('get.select.theme', ['id' => $idea_id])}}" class="return_theme_page">戻る</a>
    </div>

    <div class="inner">

        <h1>下書き</h1>
        <div class="draft-ideas">
        @if (!$draft_ideas)
        <p>下書きがありません。</p>
        @else
        <ul>
            @foreach($draft_ideas as $draft_idea)
            <li>
                <a href="#">{{ $draft_idea->elevator1 ?? '' }}</a>
            </li>
            @endforeach
        </ul>
@endif
        </div>
    </div>

</body>

</html>
