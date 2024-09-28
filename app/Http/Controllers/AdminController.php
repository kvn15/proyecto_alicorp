<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        return view('admin.pages.inicio.inicio');
    }

    public function inicio(){
        return view('admin.layouts.inicio');
    }

    public function landing(){
        return view('admin.layouts.landing');
    }

    public function juegosWeb(){
        return view('admin.layouts.juegosWeb');
    }

    public function juegosCamp(){
        return view('admin.layouts.juegosCamp');
    }

    public function configuracion(){
        return view('admin.layouts.configuracion');
    }
    
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}