<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\Xplorer;
use Illuminate\Support\Facades\DB;

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
        //modelo proyects , tipo de juego y status
        $raspa = Project::where('game_id',1)->where('project_type_id','<>',3)->where('status','1')->first();
        $ruleta = Project::where('game_id',2)->where('project_type_id','<>',3)->where('status','1')->first();
        $memoria = Project::where('game_id',3)->where('project_type_id','<>',3)->where('status','1')->first();
        return view('juegos',compact('juegos','raspa','ruleta','memoria'));
    }

    public function Promocion(){
        $promocion = 'promocion';
        return view('promocion',compact($promocion));
    }

    public function casino(){
        $casino = 'casino';
        return view('casino',compact($casino));
    }

    public function Dashboard(){
        $dashboard = 'dashboard';
        return view('cliente.dashboard',compact($dashboard));
    }
    // public function dashboard()
    // {
    //     $projects = Project::select(
    //         'projects.id',
    //         'projects.nombre_promocion', // Incluye los demás campos necesarios
    //         'projects.status',
    //         'projects.fecha_ini_proyecto',
    //         'projects.fecha_fin_proyecto',
    //         'projects.game_id',
    //         'projects.created_at',
    //         'projects.updated_at',
    //         'projects.ruta_img',
    //         'proyect_types.ruta_name',
    //         'proyect_types.name',
    //         DB::raw('COUNT(participants.id) as participant_count')
    //     )
    //     ->leftJoin('proyect_types', 'proyect_types.id', '=', 'projects.project_type_id')
    //     ->leftJoin('participants', 'participants.project_id', '=', 'projects.id')
    //     ->groupBy(
    //         'projects.id',
    //         'projects.nombre_promocion',
    //         'projects.status',
    //         'projects.fecha_ini_proyecto',
    //         'projects.fecha_fin_proyecto',
    //         'projects.game_id',
    //         'projects.created_at',
    //         'projects.ruta_img',
    //         'proyect_types.ruta_name',
    //         'proyect_types.name',
    //         'projects.updated_at'
    //     ) // Incluye todas las columnas seleccionadas
    //     ->orderBy('projects.created_at', 'desc')
    //     ->limit(3)
    //     ->get();
    //     $landing = Project::where('project_type_id', 1)->orderBy('created_at', 'desc')->get();
    //     $web = Project::where('project_type_id', 2)->orderBy('created_at', 'desc')->get();
    //     $campana = Project::where('project_type_id', 3)->orderBy('created_at', 'desc')->get();

    //     $inicio = [
    //         "projects" => $projects,
    //         "landing" => $landing,
    //         "web" => $web,
    //         "campana" => $campana,
    //     ];

    //     return view('admin.pages.inicio.inicio', compact('inicio'));
    // }

    public function configuracion(){
        $configuracion = 'configuracion';
        return view('cliente.configuracion',compact($configuracion));
    }

    public function contrasena(){
        $contrasena = 'contrasena';
        return view('cliente.contrasena',compact($contrasena));
    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Chanage Successfuly');

        }else{
            return redirect()->back()->with('error','Current Password IS Invalid');
        }

    }

    public function PUpdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('cliente.configuracion',compact('user'));
            }
        }
    }

    public function UpdateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();
            return Redirect()->route('cliente.dashboard')->with('success','User Profile Is update Successfully');

        }else{
            return Redirect()->back();
        }
    }

    public function Calendario(){
        return view('calendario');
    }


    //login para xplorer y usuarios clientes

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Intenta autenticar con la tabla `users`
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        // Si falla, intenta autenticar con la tabla `xplorers`
        if (Auth::guard('xplorer')->attempt($credentials)) {
            return redirect()->intended('/xplorer/dashboard');
        }

        // Si ambos fallan, retorna un error
        return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
    }

    public function promociones(){
        return view('cliente.promociones');
    }

    public function juegoss(){
        return view('cliente.juegos');
    }

    public function ganados(){
        return view('cliente.ganados');
    }
}

