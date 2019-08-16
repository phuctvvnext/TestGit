<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //dd(Auth::user());
        $username = Auth::user()->username;

        if($username != $role) {
            return redirect('errors');
        }
        return $next($request);
    }
}
