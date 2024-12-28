<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|max:100',
            'password' => 'required'
        ]);
        
        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        return redirect()->route('cliente.dashboard');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register() {
        return view('auth.register');
    }

    public function create(Request $request) {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_xplorer' => 0
        ]);

        return redirect('/login');
    }
}
