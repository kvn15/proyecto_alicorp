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
        return view('admin.pages.inicio.landing');
    }

    public function juegosWeb(){
        return view('admin.pages.inicio.juegosWeb');
    }

    public function juegosCamp(){
        return view('admin.pages.inicio.juegosCamp');
    }

    public function configuracion(){
        return view('admin.pages.inicio.configuracion');
    }
    
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}