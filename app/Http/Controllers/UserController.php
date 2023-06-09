<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function create()
    {
        return view('users.register');
    }


    // create new users

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8' ]
        ]);  
        // hash password
        $formFields['password'] = bcrypt($formFields['password']);
        
        // create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }


    // user logout


    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // login form
    public function login() {
        return view('users.login');
    }



    //login user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]); 

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in');
        }
        return back()-> withErrors(['email' => 'Email or password invalid'])->onlyInput('email');
    }
}
