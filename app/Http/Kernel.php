<?php

namespace App\Http;

use App\Http\Middleware\DCBCeo;
use App\Http\Middleware\DCBSubadmin;
use App\Http\Middleware\DCBSuperAdmin;
use App\Http\Middleware\UnitMpAdminMiddleware;
use App\Http\Middleware\UnitMpUser;
use App\Http\Middleware\UnitSubAdmin;
use App\Http\Middleware\UnitSuperAdmin;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'unitauth' => \App\Http\Middleware\RedirectIfNotUnitauth::class,
        'unitauth.guest' => \App\Http\Middleware\RedirectIfUnitauth::class,
        'admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        'admin.guest' => \App\Http\Middleware\RedirectIfAdmin::class,
        'systemadmin' => \App\Http\Middleware\RedirectIfNotSystemadmin::class,
        'systemadmin.guest' => \App\Http\Middleware\RedirectIfSystemadmin::class,
        'superadmin' => \App\Http\Middleware\RedirectIfNotSuperadmin::class,
        'superadmin.guest' => \App\Http\Middleware\RedirectIfSuperadmin::class,
        'mp' => \App\Http\Middleware\RedirectIfNotMp::class,
        'mp.guest' => \App\Http\Middleware\RedirectIfMp::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'super-admin' => UnitSuperAdmin::class,
        'sub-admin' => UnitSubAdmin::class,
        'mp-admin' => UnitMpUser::class,
        'dcb-super-admin' => DCBSuperAdmin::class,
        'sub-admin-dcb' => DCBSubadmin::class,
        'dcb-ceo-admin' => DCBCeo::class,
        'prevent_back_history' => PreventBackHistory::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
