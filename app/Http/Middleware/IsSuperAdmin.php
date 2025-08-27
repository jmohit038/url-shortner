<?php

namespace App\Http\Middleware;

use Closure,Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the logged-in user is a SuperAdmin (role_id = 1)
        if (Auth::user() && Auth::user()->role_id == 1) {
            return $next($request);  // Allow the request to proceed
        }

        // If not a SuperAdmin, deny access and redirect
        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
    }
}
