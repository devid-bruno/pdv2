<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            return redirect()->route('home')->with('error', 'Você não tem permissão para acessar essa página.');
        }
        return $next($request);
    }
}
