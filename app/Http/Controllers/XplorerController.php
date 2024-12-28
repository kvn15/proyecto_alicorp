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

        $validated = $request->validate([
            'email' => 'required|max:100',
            'password' => 'required'
        ]);
        
        if(!Auth::guard('xplorer')->attempt($request->only('email','password'))){
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        $user = auth('xplorer')->user();
        
        if ($user->is_xplorer == 0) {
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        return redirect()->route('xplorer.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('xplorer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/xplorer/login');
    }
}
