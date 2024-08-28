<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<header>
    <div class="logo">
        <a href="{{ route('start.show') }}"><img src="{{ asset('image/logo3.png') }}" alt="ロゴ画像"></a>
    </div>
</header>
    <div class="inner">
        <h1>ログイン</h1>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="login">
                <label for="user_name" class="title">ユーザー名</label>
                <input id="user_name" type="user_name" name="user_name" class="input" required>

                <label for="password" class="title">パスワード</label>
                <input id="password" type="password" name="password" class="input" required>
                @if($errors->any())
            <div class="error-messages">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
            </div>

            <a href="{{ route('register.show') }}">初めての方はこちら</a>

            <div class="submit">
                <button type="submit">ログイン</button>
            </div>

        </form>
    </div>
<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
