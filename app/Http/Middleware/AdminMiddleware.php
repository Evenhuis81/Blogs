<?php

namespace App\Http\Middleware;

use Closure;

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
        if ($request->user() == null) {
            return abort(403, 'guest');
        }
        elseif ($request->user()->role != 'admin')
		{
			return abort(403, 'user');
		}
        return $next($request);
    }
}
