<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    public function create(){
        return view('auth.login');
    }

    public function store()
    {
        $loginuser  =request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($loginuser))
        {
            return redirect('/register');
            // return redirect('/')->with('Success', 'you are logged in ');
        }

        return redirect('/error');
    }
}
