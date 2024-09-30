<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view("/auth.register");
    }

    public function store()
    {
        $insertnewuser  =request()->validate([
            'name'=>'required',//|'max:255',
            'email'=>'required|email',
            'password'=>'required'


        ]);

        $insertnewuser["password"] = bcrypt($insertnewuser["password"]);
        $user = User::create($insertnewuser);
        auth()->login($user);
        return redirect('/')->with('Success','your account has been created');
        // the key or the variable name tha store on it the session
    }

}

