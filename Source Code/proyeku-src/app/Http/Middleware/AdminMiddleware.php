<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
            $user_logged_in = \Illuminate\Support\Facades\Auth::user();
            if ( $user_logged_in == null)
            {
                //return $next($request);
                return "".Auth::user()->email;
            }
            else
            {
                return "".Auth::user()->email;
            }

        
    }
}
