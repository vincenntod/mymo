<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/beranda')->with('success', 'Login berhasil!');
        }
        return redirect()->route('login')->with('error', 'Username atau password gagal.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
