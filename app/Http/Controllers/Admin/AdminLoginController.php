<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificacionController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validar datos
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar loguear al admin
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {

            $admin = Auth::guard('admin')->user();
            if ($admin->status == 1) {
                // Si el 'status' es 1, redirigir al dashboard
                return redirect()->intended(route('admin.dashboard'));
            } else {
                // Si el 'status' no es 1, cerrar sesión y redirigir con mensaje de error
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors(['email' => 'Tu cuenta está inactiva.']);
            }
        } else {
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        // Si falla, redirigir de vuelta al formulario de login con datos
        // return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function recoverView() {
        return view('admin.recoverPassword');
    }

    public function recoverStore(Request $request) {

        // Validar datos
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        // Buscar el email
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || empty($admin)) {
            return back()->with('mensajeError', 'No hemos encontrado un administrador registrado con el correo electrónico ingresado. Por favor, verifica la dirección o intenta con otro correo.');
        }

        // Generamos una contraseña aleatoria
        $password = $this->generarPasswordSegura(12);

        $admin->update([
            'password' => Hash::make($password)
        ]);

        // Enviar correo
        $notificacion = new NotificacionController();
        $notificacion->notificacionRecoverPassword($admin->email, $admin->name, $password);

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
