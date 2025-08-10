<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, $role)
    {
        // Pastikan user sudah login
        if (!Session::has('user')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        // Ambil role dari session
        $userRole = Session::get('user.role');

        // Cek apakah role sesuai
        if ($userRole !== $role) {
            return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
