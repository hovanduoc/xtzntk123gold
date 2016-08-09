<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class OldMiddleware
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
        if(Session::has('email'))
        {
            return $next($request);
        }
        return redirect()->guest('login');
    }
}
