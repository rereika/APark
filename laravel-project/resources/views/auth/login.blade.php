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
    <div class="inner">
        <h1>ログイン</h1>

        @if($errors->any())
            <div class="error-messages">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="login">
                <label for="email" class="title">メールアドレス</label>
                <input id="email" type="email" name="email" class="input" required>

                <label for="password" class="title">パスワード</label>
                <input id="password" type="password" name="password" class="input" required>
            </div>

            <a href="{{ route('register.show') }}">初めての方はこちら</a>

            <div class="submit">
                <button type="submit">ログイン</button>
            </div>

        </form>
    </div>
</body>
</html>
