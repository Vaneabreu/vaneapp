<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $credentials = request()->only('email', 'password');
        
        if(Auth::attempt($credentials)) {
            request()->session()->regenerate();
        
            return redirect('dashboard');
        }
           
        return redirect ('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
