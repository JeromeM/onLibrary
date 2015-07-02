<!doctype html>
    <html lang="fr">

    @include('header')

    <body>

        <div class="container">

            <div class="row">
                <nav class="navbar navbar-default" role="navigation">

                    <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ action('IndexController@index') }}" class="font-biblio">onLibrary</a></li>
                            <li><a href="{{ action('IndexController@index') }}">Homepage</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::check())
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ action('Users\AccountController@show') }}" class="navbar-brand">{{ trans('account.infos') }}</a></li>
                                        <li><a href="{{ action('Users\AccountController@modify') }}" class="navbar-brand">{{ trans('account.modify') }}</a></li>
                                        <li><a href="{{ action('Users\AccountController@buyPlan') }}" class="navbar-brand">{{ trans('account.plan') }}</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ action('Auth\AuthController@getLogout') }}" class="navbar-brand">{{ trans('general.logout') }}</a></li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ action('Auth\AuthController@getLogin') }}" class="navbar-brand">{{ trans('general.login') }}</a></li>
                                <li><a href="{{ action('Auth\AuthController@getRegister') }}" class="navbar-brand">{{ trans('general.register') }}</a></li>
                            @endif
                        </ul>
                    </div>

                </nav>

            </div>

            @yield('content')

        </div>

        @include('footer')

    </body>

</html>