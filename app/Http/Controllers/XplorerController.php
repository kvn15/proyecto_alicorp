<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XplorerController extends Controller
{

    public function loginForm()
    {
        return view('xplorer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('xplorer')->attempt($credentials)) {
            return redirect()->intended('/xplorer/dashboard');
        }

        return back()->withErrors(['email' => 'Las credenciales no son correctas']);
    }

    public function logout()
    {
        Auth::guard('xplorer')->logout();
        return redirect('/xplorer/login');
    }
}
