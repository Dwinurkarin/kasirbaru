<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah pengguna sudah terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login'); // Ubah sesuai route login
        }

        // Cek apakah pengguna memiliki peran yang diizinkan
        if (Auth::user()->role !== $role) {
            return redirect()->route('home')->with('error', 'Akses ditolak!'); // Ubah sesuai route home atau halaman lainnya
        }

        return $next($request);
    }
}
