<?php

namespace onLibrary\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \onLibrary\Http\Middleware\EncryptCookies::class,
        \onLibrary\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'  => \onLibrary\Http\Middleware\Authenticate::class,
        'admin' => \onLibrary\Http\Middleware\Admin::class,
        'guest' => \onLibrary\Http\Middleware\RedirectIfAuthenticated::class,
    ];
}
