<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @param                           $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::guest()) {
            return redirect()->route('index');
        }

        if (!$request->user()->hasRole($role)) {
            if($request->user()->isAdministrator()) {
                return redirect()->route('dashboard.index');
            }
        }

        return $next($request);
    }
}
