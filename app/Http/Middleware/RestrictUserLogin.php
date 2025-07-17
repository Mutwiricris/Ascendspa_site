<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to guests (not authenticated)
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // Only restrict users with user_type = 'user' from accessing admin areas
        // Admin and staff can access everything
        if ($user->user_type === 'user') {
            // If it's an API request, return JSON error
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Access denied. Regular users cannot access admin areas.',
                    'error' => 'user_access_restricted'
                ], 403);
            }

            // For web requests, logout and redirect to booking area
            Auth::logout();
            return redirect()->route('booking.branches')
                ->with('error', 'Access denied. Regular users cannot access admin areas. Please use the booking system instead.');
        }

        // Allow admin and staff to continue to admin areas
        return $next($request);
    }
}