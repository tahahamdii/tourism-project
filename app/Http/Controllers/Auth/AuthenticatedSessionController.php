<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
{
    $request->authenticate();

    $request->session()->regenerate();

    // Check the role of the authenticated user
    $user = Auth::user();
    
    if ($user->role_id == 1) { // Assuming 1 is the admin role ID
        return redirect(RouteServiceProvider::HOME);
    } elseif ($user->role_id == 2) { // Assuming 2 is the user role ID
        return redirect(RouteServiceProvider::USER); // Adjust this to the route name for the user dashboard
    }

    // Fallback redirect (you can customize this as needed)
    // return redirect(RouteServiceProvider::HOME);
}


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
