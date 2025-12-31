<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // belum login
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        // bukan admin
        if (!Auth::user()->is_admin) {
            abort(403, 'ANDA BUKAN ADMIN');
        }

        return $next($request);
    }
}
