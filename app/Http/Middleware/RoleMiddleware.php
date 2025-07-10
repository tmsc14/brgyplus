<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::user()->roles()->where('name', $role)->exists()) {
            return redirect()->route('home')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
