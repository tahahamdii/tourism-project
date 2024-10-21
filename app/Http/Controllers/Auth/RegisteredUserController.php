<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()

    
    {
        $roles = Role::all();
        \Log::info($roles);
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:4',
            'role_id' => 'required|exists:roles,id',
        ]);

        Auth::login($user = User::create([
            'username' => strtolower($request->first_name).strtolower($request->last_name),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'user_type' => 'user'
        ]));

        $user->assignRole($request->role_id);

        event(new Registered($user));

        // Check the role and redirect accordingly
    if ($request->role_id == 1) { // Assuming 1 is the admin role ID
        return redirect(RouteServiceProvider::HOME);
    } elseif ($request->role_id == 2) { // Assuming 2 is the user role ID
        return redirect(RouteServiceProvider::USER); // Adjust this to the route name for the user dashboard
    }
    }
}
