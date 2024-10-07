<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $projects = Project::limit(3)->orderBy('created_at', 'desc')->get();
        $landing = Project::where('project_type_id', 1)->orderBy('created_at', 'desc')->get();
        $web = Project::where('project_type_id', 2)->orderBy('created_at', 'desc')->get();
        $campana = Project::where('project_type_id', 3)->orderBy('created_at', 'desc')->get();

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
        $projects = Project::limit(3)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->get();
        $landing = Project::where('project_type_id', 1)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->get();
        $web = Project::where('project_type_id', 2)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->get();
        $campana = Project::where('project_type_id', 3)->orderBy('created_at', 'desc')->where('admin_id',auth()->id())->get();

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
            'message' => 'Perfil de Administrador Actualizado Satisfactoriamente', 
            'alert-type' => 'info'
        );

        return redirect()->route('dashboard.configuracion')->with($notification);

    }
    
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    
}