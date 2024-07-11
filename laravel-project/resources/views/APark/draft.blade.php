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

<a href="{{ route('home')}}" class="return_home">戻る</a>
    </div>

    <div class="inner">

        <h1>下書き</h1>
        <div class="draft-ideas">
        @if ($ideas->isEmpty())
        {{-- @if (!$ideas) --}}
        <p>下書きがありません。</p>
        @else
        <ul>
        @foreach($ideas as $idea)
            <li>
                <a href="#">{{ $idea->elevator1 }}</a>
            </li>
            @endforeach
        </ul>
@endif
        </div>
    </div>

</body>

</html>
