<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role_id)
    {
        if (Auth::check() && Auth::user()->role_id == $role_id) {
            return $next($request);
        }
        abort(403, 'Acesso negado.');
    }
}
