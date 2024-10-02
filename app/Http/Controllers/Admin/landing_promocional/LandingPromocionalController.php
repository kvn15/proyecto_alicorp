<?php

namespace App\Http\Controllers\Admin\landing_promocional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPromocionalController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function show($id)
    {
        $landing = $id;
        return view('admin.pages.landing_promocional.show', compact('landing'));
    }

    public function indicador($id)
    {
        $landing = $id;
        return view('admin.pages.landing_promocional.indicadores', compact('landing'));
    }

    public function asignacion($id)
    {
        $landing = $id;
        return view('admin.pages.landing_promocional.asingnacion', compact('landing'));
    }

    public function participante($id)
    {
        $landing = $id;
        return view('admin.pages.landing_promocional.participantes', compact('landing'));
    }
    
    public function ganador($id)
    {
        $landing = $id;
        return view('admin.pages.landing_promocional.ganadores', compact('landing'));
    }

    public function configuracion($id)
    {
        $landing = $id;
        return view('admin.pages.landing_promocional.configuracion', compact('landing'));
    }
}
