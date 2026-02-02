<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/css/breadcrumbs.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="adminContentsArea">
            <div class="leftContents">
                @include('parts.aside')
            </div>
            <div class="rightContents">
                @include('parts.header')
                <main class="adminMain">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>