<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
             return view('/dashboard');
        }else{
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
            Auth::logout();
            return view('welcome');
    }
}
