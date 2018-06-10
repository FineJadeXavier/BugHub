<?php

namespace App\Http\Middleware;

use Closure;

class Signin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('id'))
        {
            return redirect()->route('user.signin');
        }
        return $next($request);
    }
}
