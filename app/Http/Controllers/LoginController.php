<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('user.logindetails');
    }

    public function login()
    {
        $input = ['email' => request('email'), 'password' => request('password')];
        if (auth()->attempt($input)) {
            return redirect()->route('welcome');
        } else {
            return redirect()->route('logindetails')->with('message', 'login credentials invalid');
        }

    }
}
