<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA Verification</title>
</head>
<body>
    <div class="container">
        <h1>2FA Verification</h1>

        <form method="POST" action="{{ route('2fa.verify.post') }}">
            @csrf

            <div>
                <label for="one_time_password">Enter your 2FA code:</label>
                <input id="one_time_password" type="text" name="one_time_password" required>
                @error('one_time_password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit">Verify</button>
            </div>
        </form>
    </div>
</body>
</html>
