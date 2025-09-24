<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCustom
{
    public function handle(Request $request, Closure $next)
    {
        // cek apakah user_id ada di session
        if (!$request->session()->has('id')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}

