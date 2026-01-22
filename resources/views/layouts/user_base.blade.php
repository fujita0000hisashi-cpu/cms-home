<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body>
        <main class="main">
            <div class="contentsArea">
                @yield('content') 
            </div>
        </main>
    </body>
</html>