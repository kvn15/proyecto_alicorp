<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validar datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar loguear al admin
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {

            $admin = Auth::guard('admin')->user();
            if ($admin->status == 1) {
                // Si el 'status' es 1, redirigir al dashboard
                return redirect()->intended(route('admin.dashboard'));
            } else {
                // Si el 'status' no es 1, cerrar sesión y redirigir con mensaje de error
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors(['email' => 'Tu cuenta está inactiva.']);
            }
        } else {
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        // Si falla, redirigir de vuelta al formulario de login con datos
        // return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
