<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminPanel;

class AdminPanelController extends Controller
{

    public function showLoginForm()
    {
        return view('adminPanel.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('adminPanel')->attempt($credentials)) {
            return redirect()->intended('/adminPanel/dashboard');
        }

        return back()->withErrors(['email' => 'Las credenciales no son correctas']);
    }

    public function logout()
    {
        Auth::guard('adminPanel')->logout();
        return redirect('/adminPanel/login');
    }

}
