<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index(){
        return view("formLayouts.login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=> ['required','email:rfc,dns'],
            'password' => ['required','min:5','max:255']
        ]);
 
        if (Auth::attempt($credentials)) {
            if ($credentials['email'] === "fawkostel@gmail.com"){
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } else{
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }
 
        return back()->with('loginError','Email atau Password kamu salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
