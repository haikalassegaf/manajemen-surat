<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect('dashboard'); // Arahkan ke dashboard jika pengguna sudah login
        }

        return $next($request);
    }
}