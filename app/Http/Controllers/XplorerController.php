<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function recoverView() {
        return view('xplorer.recoverPasswordXplorer');
    }

    public function recoverStore(Request $request) {

        // Validar datos
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        // Buscar el email
        $xplorer = User::where('email', $request->email)->where('is_xplorer', 1)->first();

        if (!$xplorer || empty($xplorer)) {
            return back()->with('mensajeError', 'No hemos encontrado un xplorer registrado con el correo electrónico ingresado. Por favor, verifica la dirección o intenta con otro correo.');
        }

        // Generamos una contraseña aleatoria
        $password = $this->generarPasswordSegura(12);

        $xplorer->update([
            'password' => Hash::make($password)
        ]);

        // Enviar correo
        $notificacion = new NotificacionController();
        $notificacion->notificacionRecoverPasswordXplorer($xplorer->email, $xplorer->name, $password);

        return back()->with('mensajeSuccess', 'Hemos enviado un correo con tu nueva contraseña a la dirección de correo electrónico registrada. Por favor, revisa tu bandeja de entrada (y la carpeta de spam o correo no deseado en caso de que no lo encuentres).');
    }

    public function generarPasswordSegura($longitud = 12) {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }
        return $password;
    }
}
