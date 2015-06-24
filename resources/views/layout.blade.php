<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>onLibrary</title>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
    </head>

    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a href="{{ action('IndexController@index') }}" class="navbar-brand">Index</a>
                    <a href="{{ action('BooksController@index') }}" class="navbar-brand">Books</a>
                    <a href="{{ action('AuthorsController@index') }}" class="navbar-brand">Authors</a>
                </div>
            </nav>
            @yield('content')
        </div>

    </body>

</html>