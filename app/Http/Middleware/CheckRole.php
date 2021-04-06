<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'admin' && auth()->user()->user_type != 'admin') {
            abort(403);
        }

        if ($role == 'supplier' && auth()->user()->user_type != 'supplier') {
            abort(403);
        }


        return $next($request);
    }
}
