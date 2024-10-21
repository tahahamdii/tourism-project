<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect('/auth/signin'); // Redirect to sign-in if not authenticated
        }

        // Check if the user has the required role
        if (in_array($user->role_id, $roles)) {
            return $next($request);
        }

        // Redirect users with role_id 2 (or whatever your user role ID is) to home
        if ($user->role_id == 2) {
            return redirect('/home');
        }

        // Redirect or show unauthorized if they don't have access
        return redirect('/'); // or use abort(403) for unauthorized access
    }
}