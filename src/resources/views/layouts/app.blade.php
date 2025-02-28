<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">FashionablyLate</h1><!--共通のヘッダーの部分-->
            @yield('link')<!-- ヘッダー内に入れる　遷移用のリンクはそれぞれに作る　-->
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>