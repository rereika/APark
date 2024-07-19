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

<a href="{{ route('home')}}" class="return_home">ホームへ</a>
    </div>

<div class="inner">

    <div class="header-container">
        <div class="title-container">
            <h1>下書き</h1>
            @if (session('message'))
            <p>{{ session('message') }}</p>
            @endif
        </div>
        <div class="buttons-container">
            <button id="editBtn">編集</button>
            <button id="deleteBtn" class="delete-btn">削除</button>
        </div>
    </div>

        <div class="draft-ideas">
        @if ($ideas->isEmpty())
        {{-- @if (!$ideas) --}}
        <p>下書きがありません。</p>
        @else
        <form id="deleteForm" method="POST" action="{{ route('ideas.draft.delete') }}">
            @csrf
            <ul>
                @foreach($ideas as $idea)
                <li>
                    <input type="checkbox" name="delete[]" class="checkbox" value="{{ $idea->id }}">
                    <a href={{ route('get.draft.to.pitch', ['id' => $idea->id])}}>{{ $idea->elevator1 }}</a>
                </li>
                @endforeach
            </ul>
        </form>
        @endif
        </div>
    </div>

    <script src="{{ asset('js/draft.js') }}"></script>
</body>

</html>
