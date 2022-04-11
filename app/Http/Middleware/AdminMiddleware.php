<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
			if ((int)auth()->user()->role !== User::ROLE_ADMIN){
				abort(404);
			}
      // dd(auth()->user()->name);
			return $next($request);
    }
}
