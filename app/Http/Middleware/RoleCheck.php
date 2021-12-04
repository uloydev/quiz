<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $isAdmin = Auth::user()->is_admin;
        if (isset($role)) {
            if ($role == 'admin' and $isAdmin) {
                return $next($request);
            } else if ($role == 'user' and ! $isAdmin) {
                return $next($request);
            }
        }
        return redirect()->route('login');
    }
}
