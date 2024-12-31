<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class XplorerController extends Controller
{

    public function loginForm()
    {
        return view('xplorer.login');
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|max:100',
            'password' => 'required'
        ]);
        
        if(!Auth::guard('xplorer')->attempt($request->only('email','password'))){
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        $user = auth('xplorer')->user();
        
        if ($user->is_xplorer == 0) {
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        return redirect()->route('xplorer.dashboard.juegosCamp');
    }

    public function logout(Request $request)
    {
        Auth::guard('xplorer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/xplorer/login');
    }

    public function juegosCamp(){
        return view('xplorer.dashboard');
    }

    public function configuracion(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('xplorer.configuracion',compact('adminData'));
    }

    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('xplorer.configuracion_editar',compact('editData'));  
    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message','La clave fue cambiado con éxito');
            return redirect()->back();
        } else{
            session()->flash('messageError','Las clave no conuerda');
            return redirect()->back();
        }

    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->apellido = $request->apellido;
        $data->telefono = $request->telefono;
        $data->tipo_documento = $request->tipo_documento;
        $data->documento = $request->documento;
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

        return redirect()->route('xplorer.dashboard.configuracion')->with($notification);

    }
}
