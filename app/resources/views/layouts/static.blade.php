<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>title</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&amp;subset=cyrillic-ext" rel="stylesheet"/>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
</head>
<body>
<div class="main-header-shop">
    @include('blocks/header')
</div>
<div class="shop-content">
    <div class="container">
        @yield('content')
    </div>
</div>

</body>
</html>