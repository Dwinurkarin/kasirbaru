<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek jika user sudah login dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            // Lanjutkan request jika role cocok
            return $next($request);
        }

        // Set flash message untuk error jika role tidak sesuai
        Session::flash('error', 'Anda tidak diperbolehkan masuk ke halaman ini.');

        // Redirect ke halaman sebelumnya atau halaman yang diinginkan jika akses ditolak
        return redirect()->back();
    }
}
