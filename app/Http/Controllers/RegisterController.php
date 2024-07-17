<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController
{
    public function index(){
        return view("formLayouts.register");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email'=> ['required','email:rfc,dns','unique:users'],
            'password' => ['required','min:5','max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        Session::flash('status', 'Registrasi kamu sudah berhasil, silahkan masuk!');
        return redirect('/login');
    }
}
