<?php

namespace App\Http\Middleware;

use Closure;

class PublicAccessMiddleware
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
        // Check if the request is coming from the specific route
        if ($request->path() === 'update-profile-picture') {
            return $next($request);
        }

        // Redirect to an error page or return an unauthorized response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
