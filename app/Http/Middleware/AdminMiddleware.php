<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and is an admin
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request);
        }

        // Redirect or abort if the user is not an admin
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}