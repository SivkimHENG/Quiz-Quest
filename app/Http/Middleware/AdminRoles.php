<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $admin): Response
    {

        $roles = Auth::check() ? Auth::user()->role->pluck('name')->toArray() : [];
        if (in_array($admin, $roles)) {
            return $next($request);
        }

        return Redirect::route('auth.dashboard');
    }
}
