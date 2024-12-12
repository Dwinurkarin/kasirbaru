<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Determine where to redirect users after login.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        // Redirect based on user role
        if ($user->role === 'admin') {
            return '/dashboard/admin';
        } elseif ($user->role === 'kasir') {
            return '/dashboard/user';
        } else {
            return '/dashboard/user';
        }
    }
}
