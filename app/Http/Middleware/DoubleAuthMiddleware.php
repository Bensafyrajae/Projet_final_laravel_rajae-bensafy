<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoubleAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        $user = $request->user();

        // Check if the user has double authentication enabled and requires verification
        if ($user && $user->double_auth && !$user->isVerified()) {
            // Redirect to the double-auth route for verification
            return redirect()->route('double-auth');
        }

        // Proceed with the request if the user does not need to verify
        return $next($request);
    }
}
