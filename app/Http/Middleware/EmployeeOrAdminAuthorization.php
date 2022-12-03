<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmployeeOrAdminAuthorization
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
        if (!$this->isAdminOrEmployee($request)) {
            // abort(Response::HTTP_UNAUTHORIZED);
            
            return redirect()->route('home');
        }

        return $next($request);
    }

    protected function isAdminOrEmployee($request)
    {
        $state = FALSE;

        if($request->user()->role_id == 1 || $request->user()->role_id == 2){
            $state = TRUE;
        }
        return $state;
    }
}
