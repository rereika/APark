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
        <a href="{{ route('home')}}" class="back_home_btn">ホームへ戻る</a>
    </div>

    <div class="inner">

        <h1>マイページ</h1>

    </div>

</body>

</html>
