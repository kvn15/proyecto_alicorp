<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GameMemoriaController extends Controller
{
    
    public function index($hub) {

        $project = Project::where('dominio', $hub)->where('project_type_id', 2)->where('game_id', 3)->first();

        if(!isset($project)){
            return redirect()->route('index');
        }

        if (!isset(Auth::user()->id)) {
            return redirect()->route('login');
        }

        $user = User::find(Auth::user()->id);

        $data = [
            'project' => $project,
            'user' => $user,
        ];

        return view('admin.pages.game_memoria.gamememoria', compact('data'));
    }

    public function store(Request $request, $id) {

        $project = Project::where('id', $id)->first();

        // Almacenar la imagen en el directorio deseado
        $ruta = '';
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $participant = new Participant();
        $participant->project_id = $id;
        $participant->user_id = Auth::user()->id;
        $participant->terminos_condiciones = 1;
        $participant->codigo = $request->codigo;
        $participant->participaciones = 1;
        $participant->file_producto = $ruta;
        $participant->save();

        $uuid = Str::uuid()->toString();

        return redirect()->route('juego.view.memoria', $project->dominio)->with('claveMemoria', $uuid);
    }

    public function show() {
        if (!session()->has('claveMemoria')) {
            return redirect()->route('index');
        }

        // Borrar la sesión
        session()->forget('claveMemoria');

        return view('admin.pages.game_memoria.viewmemoria');
    }
}
