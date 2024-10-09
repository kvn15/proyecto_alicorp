<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

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

}

