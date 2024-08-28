<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<header>
    <div class="logo">
        <a href="{{ route('start.show') }}"><img src="{{ asset('image/logo3.png') }}" alt="ロゴ画像"></a>
    </div>
</header>
    <div class="inner">
    <h1><span class="highlight">APark</span>へようこそ！</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="user_name" class="title">ユーザー名</label>
                <input id="user_name" type="user_name" name="user_name" value="{{ old('user_name') }}" required class="input" placeholder="例：apark_admin">
                @error('user_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="title">パスワード</label>
                <input id="password" type="password" name="password" required class="input" placeholder="半角英数字8~32文字">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="title">パスワード確認</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="input" placeholder="確認のためもう一度入力してください">
            </div>

            <div class="form-group">
                <label for="batch" class="title">期生</label>
                <select id="batch" name="batch" required class="input">
                    <option value="">選択してください</option>
                    @for ($i = 1; $i <= 7; $i++)
                        <option value="{{ $i }}">{{ $i }}期生</option>
                    @endfor
                </select>
            </div>

            <div class="submit">
                <button type="submit">登録する</button>
            </div>

        </form>
    </div>
</body>
</html>
