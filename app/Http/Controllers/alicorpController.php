<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alicorpController extends Controller
{
    public function index(){
        return view('index');
    }

    public function Perfil(){
        $perfil='perfil';
        return view('perfil',compact($perfil));
    }

    public function Contacto(){
        $contacto='contacto';
        return view('contacto',compact($contacto));
    }

    public function Nuevo(){
        $nuevo='nuevo';
        return view('nuevo',compact($nuevo));
    }

    public function Reclamacion(){
        $reclamacion = 'reclamacion';
        return view('reclamacion',compact($reclamacion));
    }

    public function Juegos(){
        $juegos = 'juegos';
        return view('juegos',compact($juegos));
    }

    public function Promocion(){
        $promocion = 'promocion';
        return view('promocion',compact($promocion));
    }

    public function Dashboard(){
        $dashboard = 'dashboard';
        return view('cliente.dashboard',compact($dashboard));
    }



}

