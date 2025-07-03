<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(prepend: [
            \Illuminate\Http\Middleware\HandleCors::class,
        ]);
        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(fn(UnauthorizedException $e, $request) => response()->json([
            'success' => false,
            'message' => $e->getMessage() ?: 'You are not authorized to access this resource.',
            'data' => null,
        ], 403));

        $exceptions->render(fn(AccessDeniedHttpException $e, $request) => response()->json([
            'success' => false,
            'message' => $e->getMessage() ?: 'You are not authorized to access this resource.',
            'data' => null,
        ], 403));

        $exceptions->render(fn(AuthorizationException $e, $request) => response()->json([
            'success' => false,
            'message' => $e->getMessage() ?: 'You are not authorized to access this resource.',
            'data' => null,
        ], 403));

        $exceptions->render(fn(AuthenticationException $e, $request) => response()->json([
            'success' => false,
            'message' => $e->getMessage() ?: 'You are not authenticated',
            'data' => null,
        ], 401));
    })->create();
