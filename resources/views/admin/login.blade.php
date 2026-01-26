<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン</title>
        @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="login">
            <div class="loginFormArea">
                <h2 class="loginFormArea__title">管理画面</h2>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="loginItemBox">
                        <label for="email">Email</label>
                        <input type="text" class="loginInput" id="email" name="email">
                        @error('email')
                            <span class="errorMessage">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="loginItemBox">
                        <label for="password">Pass</label>
                        <input type="password" class="loginInput" id="password" name="password">
                        @error('password')
                            <span class="errorMessage">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="submitButton">Login</button>
                </form>
            </div>
        </div>
    </body>
</html>