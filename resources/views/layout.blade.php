<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>onLibrary</title>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>

    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a href="{{ action('IndexController@index') }}" class="navbar-brand">{{ trans('general.index') }}</a>
                    @if (Auth::check())
                        <a href="{{ action('Auth\AuthController@getLogout') }}" class="navbar-brand">{{ trans('general.logout') }}</a>
                    @else
                        <a href="{{ action('Auth\AuthController@getLogin') }}" class="navbar-brand">{{ trans('general.login') }}</a>
                        <a href="{{ action('Auth\AuthController@getRegister') }}" class="navbar-brand">{{ trans('general.register') }}</a>
                    @endif
                </div>
            </nav>
            @yield('content')
        </div>

    </body>

</html>