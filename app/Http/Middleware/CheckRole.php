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
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        foreach ($roles as $role) {
            $roleId = Role::where('name', $role)->first()->id; // obtém o ID da role pelo nome
            if ($user->role_id === $roleId) { // compara o ID da role do usuário com o ID da role atual do loop
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }
}
