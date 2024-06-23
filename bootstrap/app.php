<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\isAdmin::class,
            'isAdminActive' => \App\Http\Middleware\isAdminActive::class
        ]);
        // $middleware->validateCsrfTokens(except: [
        //     'http:/127.0.0.1/login-admin' // <-- exclude this route
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
