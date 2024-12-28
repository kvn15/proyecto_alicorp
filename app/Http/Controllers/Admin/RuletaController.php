<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificacionController;
use App\Models\AsignacionProject;
use App\Models\AwardProject;
use App\Models\KeepTrying;
use App\Models\OtherParticipant;
use App\Models\Participant;
use App\Models\Project;
use App\Models\Roulette;
use App\Models\User;
use App\Models\ViewProject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RuletaController extends Controller
{
    public function storePersonalizar(Request $request, $id) {

        // Actualizar o crear datos del juego
        $isRuleta = Roulette::where('project_id', $id)->first();
        // Fondo
        $rutaFondo = isset($isRuleta) && !empty($isRuleta->fondo) && $request['banner-subir-url'] != null ?  $isRuleta->fondo : '';
        if ($request->hasFile('banner-subir')) {
            
            if(isset($isRuleta)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRuleta->fondo); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRuleta->fondo)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaFondo = $request->file('banner-subir')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        // Logo Principal
        $rutaLogoPrincipal = isset($isRuleta) && !empty($isRuleta->logo_inicio) && $request['logo-subir-url'] != null ?  $isRuleta->logo_inicio : '';
        if ($request->hasFile('logo-subir')) {
            
            if(isset($isRuleta)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRuleta->logo_inicio); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRuleta->logo_inicio)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaLogoPrincipal = $request->file('logo-subir')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        // Logo Juego
        $rutaLogoGame = isset($isRuleta) && !empty($isRuleta->logo_juego) && $request['logo-subir-game-url'] != null ?  $isRuleta->logo_juego : '';
        if ($request->hasFile('logo-subir-game')) {
            
            if(isset($isRuleta)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRuleta->logo_juego); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRuleta->logo_juego)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaLogoGame = $request->file('logo-subir-game')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        // Titulo premio
        $rutaTituloPremio = isset($isRuleta) && !empty($isRuleta->titulo_premio) && $request['gano-subir-url'] != null ?  $isRuleta->titulo_premio : '';
        if ($request->hasFile('premio-gano-subir')) {
            
            if(isset($isRuleta)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRuleta->titulo_premio); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRuleta->titulo_premio)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaTituloPremio = $request->file('premio-gano-subir')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }

        $sigueIntentandoBD = KeepTrying::where('project_id', $id)->first();

        $sigueIntentando = isset($sigueIntentandoBD["imagen"])  && !empty($sigueIntentandoBD["imagen"]) && $request["sigue-intentando-subir-url"] != null ? $sigueIntentandoBD["imagen"] : "";
        if ($request->hasFile('sigue-intentando-subir')) {
            $sigueIntentando = $request->file('sigue-intentando-subir')->store('premios', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $imagen_no_premio = isset($sigueIntentandoBD["imagen_no_premio"])  && !empty($sigueIntentandoBD["imagen_no_premio"]) && $request["sigue-intentando-subir-url2"] != null ? $sigueIntentandoBD["imagen_no_premio"] : "";
        if ($request->hasFile('sigue-intentando-subir2')) {
            $imagen_no_premio = $request->file('sigue-intentando-subir2')->store('premios', 'public'); // Almacena en storage/app/public/imagenes
        }


        if (isset($sigueIntentandoBD) && !empty($sigueIntentandoBD)) {
            $sigueIntentandoBD->update([
                'imagen' => $sigueIntentando,
                'imagen_no_premio' => $imagen_no_premio
            ]);
        } else {
            KeepTrying::create([
                'project_id' => $id,
                'imagen' => $sigueIntentando,
                'imagen_no_premio' => $imagen_no_premio
            ]);
        }
        
        $titulo_inicio = [
            'bold-titulo-parrafo' => isset($request['bold-titulo-parrafo']) ? 1 : 0,
            'italic-titulo-parrafo' => isset($request['italic-titulo-parrafo']) ? 1 : 0,
            "texto-header" => $request["texto-header"],
            "tamanoTexto" => $request["tamanoTexto"],
            "alineacionTexto" => $request["alineacionTexto"],
            "color-texto-input" => $request["color-texto-input"],
        ];

        $titulo_juego = [
            'bold-titulo-parrafo-game' => isset($request['bold-titulo-parrafo-game']) ? 1 : 0,
            'italic-titulo-parrafo-game' => isset($request['italic-titulo-parrafo-game']) ? 1 : 0,
            "texto-header-game" => $request["texto-header-game"],
            "tamanoTextoGame" => $request["tamanoTextoGame"],
            "alineacionTextoGame" => $request["alineacionTextoGame"],
            "color-texto-game" => $request["color-texto-game"],
        ];

        $boton_premio = [
            'verBoton' => $request["verBoton"],
            'color-texto-btn' => $request["color-texto-btn"],
            'color-btn-bg-input' => $request["color-btn-bg-input"]
        ];

        $politica = [
            "color-politica-btn" => $request["color-politica-btn"],
            "politicas_value" => $request["politicas_value"]
        ];

        $termino = [
            "color-termino-btn" => $request["color-termino-btn"],
            "terminos_value" => $request["terminos_value"]
        ];

        // Registra
        if (!isset($isRuleta)) {
                    
            Roulette::create([
                'project_id' => $id,
                'fondo' => $rutaFondo,
                'titulo_inicio' => json_encode($titulo_inicio, true),
                'logo_inicio' => $rutaLogoPrincipal,
                'titulo_juego' => json_encode($titulo_juego, true),
                'logo_juego' => $rutaLogoGame,
                'titulo_premio' => $rutaTituloPremio,
                'boton_premio' => json_encode($boton_premio, true),
                'politicas' => json_encode($politica, true),
                'terminos' => json_encode($termino, true),
            ]);

        } else { // Actualizar
            $RaspaGana = Roulette::findOrFail($isRuleta->id);
            $RaspaGana->update([
                'project_id' => $id,
                'fondo' => $rutaFondo,
                'titulo_inicio' => json_encode($titulo_inicio, true),
                'logo_inicio' => $rutaLogoPrincipal,
                'titulo_juego' => json_encode($titulo_juego, true),
                'logo_juego' => $rutaLogoGame,
                'titulo_premio' => $rutaTituloPremio,
                'boton_premio' => json_encode($boton_premio, true),
                'politicas' => json_encode($politica, true),
                'terminos' => json_encode($termino, true),
            ]);
        }

        $isRuleta = Roulette::where('project_id', $id)->first();

        return response()->json($isRuleta);
    }

    public function storeImgPremio(Request $request, $id) {
    
        // Obtener los premios
        $premio = AwardProject::findOrFail($id);

        // insertar imagen
        $ruta = !empty($premio->imagen) && $request["premio_subir_url"] != "null" ?  $premio->imagen : '';
        if ($request->hasFile('premio_subir')) {
            
            if(!empty($ruta)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($premio->imagen); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($premio->imagen)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $ruta = $request->file('premio_subir')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Actualizar premio
        $premio->update([
            'imagen' => $ruta
        ]);

        return response()->json([
            'message' => 'Se cargo correctamente la imagen para ruleta',
            'ruta' => $ruta
        ]);
    }

    public function storeImgPremioFinal(Request $request, $id) {
        
        // Obtener los premios
        $premio = AwardProject::findOrFail($id);

        // insertar imagen
        $ruta = !empty($premio->imagen) ?  $premio->imagen : '';
        if ($request->hasFile('subir_premio')) {
            
            if(!empty($ruta)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($premio->imagen); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($premio->imagen)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $ruta = $request->file('subir_premio')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Actualizar premio
        $premio->update([
            'imagen_premio' => $ruta
        ]);

        return response()->json([
            'message' => 'Se cargo correctamente la imagen para ruleta',
            'ruta' => $ruta
        ]);
    }

    public function show($hub) {
    
        // Obtener proyecto
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 2)->first();
        
        if(!isset($project)){
            return redirect()->route('index');
        }
        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

        if (!session()->has('claveRuleta')) {
            return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $hub);
        }
        $idParticipante = session('claveRuleta');
        
        $gameRuleta = Roulette::where('project_id', $project->id)->first();
        $projectPremio = AwardProject::where('project_id', $project->id)->get();

        if ($project->project_type_id == 3) {
            $premioRuleta = DB::table('award_projects')
            ->join('premio_pdvs', 'premio_pdvs.award_project_id', 'award_projects.id')
            ->join('asignacion_projects', 'asignacion_projects.id', 'premio_pdvs.asignacion_project_id')
            ->where('asignacion_projects.project_id', $project->id)
            ->where('asignacion_projects.sales_point_id', intval(session('punto_venta_ruleta')))
            ->where('asignacion_projects.user_id', Auth::user()->id)
            ->where('premio_pdvs.qty_premio', '>', 0)
            ->select('premio_pdvs.id', 'award_projects.nombre_premio as name', DB::raw("CONCAT('/storage/', award_projects.imagen) AS img"))
            ->get();
        } else {
            $premioRuleta = DB::table('award_projects')->where('project_id', $project->id)->select('id', 'nombre_premio as name', DB::raw("CONCAT('/storage/', imagen) AS img"))->get();
        }
        
        $premio = $this->obtenerPremio($project->id);
        $sigueIntentando = KeepTrying::where('project_id', $project->id)->first();

        $data = [
            'idParticipante' => $idParticipante,
            'project' => $project,
            'gameRuleta' => $gameRuleta,
            'projectPremio' => $projectPremio,
            'premio' => $premio,
            'premioRuleta' => $premioRuleta,
            'sigueIntentando' => $sigueIntentando
        ];

        // Borrar la sesión
        session()->forget('claveRuleta');

        return view('admin.pages.ruleta.ruleta', compact('data'));
    }

    public function obtenerPremio($projectId) {
        // Obtener todos los premios con su probabilidad
        $project = Project::findOrFail($projectId);
        if ($project->project_type_id == 3) {
            $premios = DB::table('award_projects')
            ->join('premio_pdvs', 'premio_pdvs.award_project_id', 'award_projects.id')
            ->join('asignacion_projects', 'asignacion_projects.id', 'premio_pdvs.asignacion_project_id')
            ->where('asignacion_projects.project_id', $projectId)
            ->where('asignacion_projects.sales_point_id', intval(session('punto_venta_ruleta')))
            ->where('asignacion_projects.user_id', Auth::user()->id)
            ->where('premio_pdvs.qty_premio', '>', 0)
            ->select('premio_pdvs.id', 'award_projects.nombre_premio', 'award_projects.imagen', 'premio_pdvs.probabilidad')
            ->get();
        } else {
            $premios = AwardProject::where('project_id', $projectId)->where('stock','>',0)->get();
        }
        
        // Crear un array acumulativo para la probabilidad
        $acumulado = [];
        $total = 0;
    
        foreach ($premios as $premio) {
            $total += $premio->probabilidad;
            $acumulado[] = [
                'id' => $premio->id,
                'nombre' => $premio->nombre_premio,
                'imagen' => $premio->imagen,
                'prob_acum' => $total
            ];
        }
        $total += $project->prob_no_premio;
        $acumulado[] = [
            'id' => 0,
            'nombre' => 'Sigue intentando',
            'imagen' => '',
            'prob_acum' => $total
        ];
    
        // Generar un número aleatorio entre 1 y 100
        $random = rand(1, $total);
    
        // Buscar el premio que corresponde al número aleatorio
        foreach ($acumulado as $item) {
            if ($random <= $item['prob_acum']) {
                return [
                    'premio_id' => $item['id'],
                    'premio_nombre' => $item['nombre'],
                    'imagen' => $item['imagen']
                ];
            }
        }
    }

    // 
    public function index($hub) {
        
        // Obtener proyecto
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 2)->first();

        if(!isset($project)){
            return redirect()->route('index')->with('projecto', 'El juego no existe o no esta publicado.');
        }

        $fechaActual = Carbon::now('America/Lima')->startOfDay();
        if (isset($project->fecha_fin_proyecto)) {
            if ($fechaActual->toDateTimeString() > $project->fecha_fin_proyecto) {
                return redirect()->route('index')->with('projecto', 'El juego se encuentra finalizado.');
            }
        }

        // if ($project->project_type_id != 3) { // no es campaña
        //     if (!isset(Auth::user()->id)) {
        //         return redirect()->route('login');
        //     }
        
        //     $user = User::find(Auth::user()->id);
        // }
        
        // Juegos campaña necesitas auth
        if (!isset(Auth::user()->id)) {
            return redirect()->route('login');
        }
    
        $user = User::find(Auth::user()->id);

        if ($project->project_type_id == 3) {
            if ($user->is_xplorer != 1) {
                return redirect()->route('index')->with('projecto', 'No tiene permitido ingresar a este juego.');
            }

            $asignacion = AsignacionProject::where('project_id', $project->id)->where('user_id', $user->id)->get();

            if (count($asignacion) == 0) {
                return redirect()->route('index')->with('projecto', 'No tiene acceso a este juego.');
            }
        }

        // Vista Proyecto
        ViewProject::create([
            'project_id' => $project->id,
            'codigo' => Str::random(10)
        ]);
        $gameRuleta = Roulette::where('project_id', $project->id)->first();

        $puntoVenta = DB::table("sales_points")
            ->join('asignacion_projects', 'asignacion_projects.sales_point_id', 'sales_points.id')
            ->where('asignacion_projects.project_id', $project->id)
            ->where('asignacion_projects.user_id', $user->id)
            ->select('sales_points.*')
            ->distinct()
            ->get()->toArray();

        $data = [
            'project' => $project,
            'user' => $user ?? null,
            'gameRuleta' => $gameRuleta,
            'puntoVenta' => $puntoVenta
        ];

        return view('admin.pages.ruleta.registroruleta', compact('data'));
    }

    public function store(Request $request, $id) {

        try {
            $project = Project::where('id', $id)->first();

            $fechaActual = Carbon::now('America/Lima')->startOfDay();
            if (isset($project->fecha_fin_participar)) {
                if ($fechaActual->toDateTimeString() > $project->fecha_fin_participar) {
                    return redirect()->back()->with('mensaje', 'La participación para este juego ha finalizado.');;
                }
            }

            // Almacenar la imagen en el directorio deseado
            $ruta = '';
            if ($request->hasFile('imagen')) {
                $ruta = $request->file('imagen')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
            }
            $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

            // Verificar si el codigo ya existe
            $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

            if (isset($isCodigo)) {
                return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $project->dominio)->with('mensaje', 'El N° de LOTE ya existe.')->withInput();
            }

            $other_participant_id = null;

            if ($project->project_type_id == 3) {
                // Si existe el dni
                $otherParticipant = OtherParticipant::where('nro_documento', $request->documento)->first();

                if (isset($otherParticipant)) {
                    
                    $otherParticipant->update([
                        'nombres' => $request->name,
                        'apellidos' => $request->apellido,
                        'edad' => $request->edad,
                        'telefono' => $request->telefono,
                        'correo' => $request->email
                    ]);

                    $other_participant_id = $otherParticipant->id;
                } else {

                    $isCorreo = OtherParticipant::where('correo', $request->email)->get();

                    if (count($isCorreo) > 0) {
                        return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $project->dominio)->with('mensaje', 'El correo ya se encuentra registrado.')->withInput();
                    }

                    $isTelefono = OtherParticipant::where('telefono', $request->telefono)->get();

                    if (count($isTelefono) > 0) {
                        return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $project->dominio)->with('mensaje', 'El telefono ya se encuentra registrado.')->withInput();
                    }

                    $otherParticipant = OtherParticipant::create([
                        'nombres' => $request->name,
                        'apellidos' => $request->apellido,
                        'edad' => $request->edad,
                        'telefono' => $request->telefono,
                        'correo' => $request->email,
                        'tipo_doc' => $request->tipo_doc,
                        'nro_documento' => trim($request->documento),
                    ]);

                    $other_participant_id = $otherParticipant->id;
                }
                
            }

            $userId = isset(Auth::user()->id) && $project->project_type_id != 3 ? Auth::user()->id : null;

            if ($project->project_type_id != 3) {

                $user= User::findOrFail(Auth::user()->id);

                if (trim($request->documento) == $user->documento) {
                    // Actualizar usuario
                    $user->update([
                        'name' => $request->name,
                        'apellido' => $request->apellido,
                        'tipo_documento' => $request->tipo_doc,
                        'documento' => $request->documento,
                        'edad' => $request->edad,
                        'telefono' => $request->telefono
                    ]);
                } else {

                    $user= User::where('documento', trim($request->documento))->first();

                    $userId = null;
                    if (isset($user) && !empty($user)) {
                        // Actualizar usuario
                        $user->update([
                            'name' => $request->name,
                            'apellido' => $request->apellido,
                            'tipo_documento' => $request->tipo_doc,
                            'documento' => trim($request->documento),
                            'edad' => $request->edad,
                            'telefono' => $request->telefono
                        ]);
                    } else {
                        // Si existe el dni
                        $otherParticipant = OtherParticipant::where('nro_documento', trim($request->documento))->first();

                        if (isset($otherParticipant)) {
                            
                            $otherParticipant->update([
                                'nombres' => $request->name,
                                'apellidos' => $request->apellido,
                                'edad' => $request->edad,
                                'telefono' => $request->telefono,
                                'correo' => $request->email
                            ]);

                            $other_participant_id = $otherParticipant->id;
                        } else {

                            $isCorreo = OtherParticipant::where('correo', $request->email)->get();

                            if (count($isCorreo) > 0) {
                                return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $project->dominio)->with('mensaje', 'El correo ya se encuentra registrado.')->withInput();
                            }

                            $isTelefono = OtherParticipant::where('telefono', $request->telefono)->get();

                            if (count($isTelefono) > 0) {
                                return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $project->dominio)->with('mensaje', 'El telefono ya se encuentra registrado.')->withInput();
                            }

                            $otherParticipant = OtherParticipant::create([
                                'nombres' => $request->name,
                                'apellidos' => $request->apellido,
                                'edad' => $request->edad,
                                'telefono' => $request->telefono,
                                'correo' => $request->email,
                                'tipo_doc' => $request->tipo_doc,
                                'nro_documento' => trim($request->documento),
                            ]);

                            $other_participant_id = $otherParticipant->id;
                        }
                    }

                }

            }
            
            $participant = new Participant();
            $participant->project_id = $id;
            $participant->user_id = $userId;
            $participant->other_participant_id = $other_participant_id;
            $participant->terminos_condiciones = 1;
            $participant->codigo = $request->codigo;
            $participant->codigo_valido = 1;
            $participant->participaciones = 1;
            $participant->file_producto = $ruta;
            $participant->punto_entrega = isset($request->punto_venta) && !empty($request->punto_venta) ? $request->punto_venta : null;
            $participant->save();

            $uuid = Str::uuid()->toString();

            session(['punto_venta_ruleta' => $request->punto_venta]);

            $variable = env('MAIL_USERNAME');
            if (isset($variable) && $variable != null && $variable != '') {
                // Enviar notificacion a administrador
                $notificacion = new NotificacionController();
                $notificacion->notificacionTyC($participant->id);
            }

            return redirect()->route($tipoJuego.'juego.view.ruleta', $project->dominio)->with('claveRuleta', $participant->id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('mensaje', 'Ocurrio un error inesperado.')->withInput();
        }
    }
}
