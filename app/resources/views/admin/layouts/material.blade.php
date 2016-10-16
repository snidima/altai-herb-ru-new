<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>




</head>
<body>


    <nav class="">
        <div class="nav-wrapper deep-purple lighten-2">
            <div class="container">
            {{--<a href="#" class="brand-logo">Logo</a>--}}
                <ul id="nav-mobile" class="right ">
                    <li><a href="sass.html">Товары</a></li>
                    <li><a href="badges.html">Заказы</a></li>
                    <li><a href="collapsible.html">Опции</a></li>
                    <li><a href="collapsible.html">SEO</a></li>
                </ul>
            </div>
        </div>
    </nav>


@yield('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>




    <script src="{{ asset('js/jquery.serialize-object.min.js') }}"></script>


    <script src="{{ asset('js/admin/api.js') }}"></script>
    <script src="{{ asset('js/admin/helpers.js') }}"></script>

    <script src="{{ asset('js/admin/Models.js') }}"></script>
    <script src="{{ asset('js/admin/Views.js') }}"></script>

    <script src="{{ asset('js/admin/app.js') }}"></script>

</body>
</html>