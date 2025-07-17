<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Trust all proxies for Vercel
        $middleware->trustProxies(at: '*');
        
        // CORS configuration
        $middleware->web(append: [
            \App\Http\Middleware\HandleCors::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle exceptions for serverless environment
        $exceptions->render(function (Throwable $e) {
            if (app()->environment('production')) {
                return response()->json([
                    'error' => 'Something went wrong',
                    'message' => $e->getMessage()
                ], 500);
            }
        });
    })->create();
