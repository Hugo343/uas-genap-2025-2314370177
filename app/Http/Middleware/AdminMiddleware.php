<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login dan memiliki hak admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Kalau bukan admin, arahkan kembali
        return redirect('/')->with('error', 'Anda tidak memiliki akses sebagai admin.');
    }
}
