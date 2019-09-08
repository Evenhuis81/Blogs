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
            return abort(403, 'Just Visiting?');
        }
        elseif ($request->user()->role == 'guest')
		{
			return abort(403, 'Registered_Guest');
        }
        elseif ($request->user()->role == 'writer')
		{
			return abort(403, 'Writer');
		}
        return $next($request);
    }
}
