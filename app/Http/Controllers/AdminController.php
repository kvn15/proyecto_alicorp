<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//use ProjectController;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $projects = Project::select(
            'projects.id',
            'projects.nombre_promocion', // Incluye los demás campos necesarios
            'projects.status',
            'projects.fecha_ini_proyecto',
            'projects.fecha_fin_proyecto',
            'projects.game_id',
            'projects.created_at',
            'projects.updated_at',
            'projects.ruta_img',
            'proyect_types.ruta_name',
            'proyect_types.name',
            DB::raw('COUNT(participants.id) as participant_count')
        )
        ->leftJoin('proyect_types', 'proyect_types.id', '=', 'projects.project_type_id')
        ->leftJoin('participants', 'participants.project_id', '=', 'projects.id')
        ->groupBy(
            'projects.id',
            'projects.nombre_promocion',
            'projects.status',
            'projects.fecha_ini_proyecto',
            'projects.fecha_fin_proyecto',
            'projects.game_id',
            'projects.created_at',
            'projects.ruta_img',
            'proyect_types.ruta_name',
            'proyect_types.name',
            'projects.updated_at'
        ) // Incluye todas las columnas seleccionadas
        ->orderBy('projects.created_at', 'desc')
        ->limit(3)
        ->get();
        $landing = Project::where('project_type_id', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        $web = Project::where('project_type_id', 2)->orderBy('created_at', 'desc')->limit(5)->get();
        $campana = Project::where('project_type_id', 3)->orderBy('created_at', 'desc')->limit(5)->get();

        $inicio = [
            "projects" => $projects,
            "landing" => $landing,
            "web" => $web,
            "campana" => $campana,
        ];

        return view('admin.pages.inicio.inicio', compact('inicio'));
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

    public function dashboardMio()
    {
        $projects = Project::select(
            'projects.id',
            'projects.nombre_promocion', // Incluye los demás campos necesarios
            'projects.status',
            'projects.fecha_ini_proyecto',
            'projects.fecha_fin_proyecto',
            'projects.game_id',
            'projects.created_at',
            'projects.updated_at',
            'projects.ruta_img',
            'proyect_types.ruta_name',
            'proyect_types.name',
            DB::raw('COUNT(participants.id) as participant_count')
        )
        ->leftJoin('proyect_types', 'proyect_types.id', '=', 'projects.project_type_id')
        ->leftJoin('participants', 'participants.project_id', '=', 'projects.id')
        ->where('projects.admin_id',auth()->id())
        ->groupBy(
            'projects.id',
            'projects.nombre_promocion',
            'projects.status',
            'projects.fecha_ini_proyecto',
            'projects.fecha_fin_proyecto',
            'projects.game_id',
            'projects.created_at',
            'projects.ruta_img',
            'proyect_types.ruta_name',
            'proyect_types.name',
            'projects.updated_at'
        ) // Incluye todas las columnas seleccionadas
        ->orderBy('projects.created_at', 'desc')
        ->limit(3)
        ->get();
        $landing = Project::where('project_type_id', 1)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->limit(5)->get();
        $web = Project::where('project_type_id', 2)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->limit(5)->get();
        $campana = Project::where('project_type_id', 3)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->limit(5)->get();

        $inicio = [
            "projects" => $projects,
            "landing" => $landing,
            "web" => $web,
            "campana" => $campana,
        ];

        return view('admin.pages.inicio.inicio', compact('inicio'));
    }

    public function landingMio(){
        return view('admin.pages.inicio.landing');
    }

    public function juegosWebMio(){
        return view('admin.pages.inicio.juegosWeb');
    }

    public function juegosCampMio(){
        return view('admin.pages.inicio.juegosCamp');
    }


    public function configuracion(){
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.pages.inicio.configuracion',compact('adminData'));
    }

    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.pages.inicio.configuracion_editar',compact('editData'));  
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('img/upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'messagePerfil' => 'Perfil de Administrador Actualizado Satisfactoriamente', 
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard.configuracion')->with($notification);

    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = Admin::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','La clave fue cambiado con éxito');
            return redirect()->back();
        } else{
            session()->flash('messageError','Las clave no conuerda');
            return redirect()->back();
        }

    }
    
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function xplorer_admin() {

        return view('admin.pages.xplorer_admin.xplorer_admin');
    }
    
}