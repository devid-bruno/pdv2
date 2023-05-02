<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Role;
use \App\Models\User;
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

        return redirect('/')
            ->with('error', 'Acesso negado. Você não tem permissão para acessar esta página.')
            ->with('timeout', 5);
    }
}
