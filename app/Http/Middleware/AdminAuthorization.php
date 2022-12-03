<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!$this->isAdmin($request)) {
            // abort(Response::HTTP_UNAUTHORIZED);
            
            return redirect()->route('home');
        }

        return $next($request);
    }

    protected function isAdmin($request)
    {
        return $request->user()->role_id == 1;
    }
}
