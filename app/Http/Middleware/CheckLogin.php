<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Jika belum login, redirect ke halaman login
        if (!Session::has('user')) {
            return redirect('/login')->withErrors([
                'login' => 'Silakan login terlebih dahulu.'
            ]);
        }

        return $next($request);
    }
}
