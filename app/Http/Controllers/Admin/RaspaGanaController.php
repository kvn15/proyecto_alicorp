<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificacionController;
use App\Models\AsignacionProject;
use App\Models\AwardProject;
use App\Models\KeepTrying;
use App\Models\OtherParticipant;
use App\Models\Participant;
use App\Models\PremioPdv;
use App\Models\Project;
use App\Models\RaspaGana;
use App\Models\User;
use App\Models\ViewProject;
use App\Models\Xplorer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RaspaGanaController extends Controller
{
    public function storePersonalizar(Request $request, $id) {

        // Actualizar o crear datos del juego
        $isRaspaGana = RaspaGana::where('project_id', $id)->first();

        // Guardar Imagenes principales

        // Fondo
        $rutaFondo = isset($isRaspaGana) && !empty($isRaspaGana->fondo) && $request["banner-subir-url"] != null ?  $isRaspaGana->fondo : '';
        if ($request->hasFile('banner-subir')) {

            if(isset($isRaspaGana)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRaspaGana->fondo); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRaspaGana->fondo)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaFondo = $request->file('banner-subir')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Logo Principal
        $rutaLogoPrincipal = isset($isRaspaGana) && !empty($isRaspaGana->logo_principal) && $request["logo-subir-url"] != null ?  $isRaspaGana->logo_principal : '';
        if ($request->hasFile('logo-subir')) {

            if(isset($isRaspaGana)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRaspaGana->logo_principal); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRaspaGana->logo_principal)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaLogoPrincipal = $request->file('logo-subir')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Imagen Raspar
        $rutaImgRaspar = isset($isRaspaGana) && !empty($isRaspaGana->imagen_raspar) && $request["raspar-subir-url"] != null ?  $isRaspaGana->imagen_raspar : '';
        if ($request->hasFile('raspar-subir')) {

            if(isset($isRaspaGana)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRaspaGana->imagen_raspar); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRaspaGana->imagen_raspar)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaImgRaspar = $request->file('raspar-subir')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Titulo subir
        $rutaImgTitulo = isset($isRaspaGana) && !empty($isRaspaGana->titulo_subir) && $request["gano-subir-url"] != null ?  $isRaspaGana->titulo_subir : '';
        if ($request->hasFile('gano-subir')) {

            if(isset($isRaspaGana)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRaspaGana->titulo_subir); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRaspaGana->titulo_subir)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaImgTitulo = $request->file('gano-subir')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Titulo subir
        $rutaImgTituloGanastes = isset($isRaspaGana) && !empty($isRaspaGana->titulo_ganastes) && $request["titulo-ganastes-url"] != null ?  $isRaspaGana->titulo_ganastes : '';

        if ($request->hasFile('titulo-ganastes')) {

            if(isset($isRaspaGana)) {
                // Obtener la ruta de la imagen
                $rutaFav = public_path($isRaspaGana->titulo_ganastes); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaFav) && !empty($isRaspaGana->titulo_ganastes)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $rutaImgTituloGanastes = $request->file('titulo-ganastes')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes

        }

        $sigueIntentandoBD = KeepTrying::where('project_id', $id)->first();
        $sigueIntentando = isset($sigueIntentandoBD["imagen"])  && !empty($sigueIntentandoBD["imagen"]) && $request["sigue-intentando-subir-url"] != null ? $sigueIntentandoBD["imagen"] : "";;
        if ($request->hasFile('sigue-intentando-subir')) {
            $sigueIntentando = $request->file('sigue-intentando-subir')->store('premios', 'public'); // Almacena en storage/app/public/imagenes
        }

        if (isset($sigueIntentandoBD) && !empty($sigueIntentandoBD)) {
            $sigueIntentandoBD->update([
                'imagen' => $sigueIntentando
            ]);
        } else {
            KeepTrying::create([
                'project_id' => $id,
                'imagen' => $sigueIntentando
            ]);
        }

        $titulo = [
            'bold-titulo-parrafo' => isset($request['bold-titulo-parrafo']) ? 1 : 0,
            'italic-titulo-parrafo' => isset($request['italic-titulo-parrafo']) ? 1 : 0,
            "texto-header" => $request["texto-header"],
            "tamanoTexto" => $request["tamanoTexto"],
            "alineacionTexto" => $request["alineacionTexto"],
            "color-texto-input" => $request["color-texto-input"],
        ];

        $boton_premios = [
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
        if (!isset($isRaspaGana)) {

            RaspaGana::create([
                'project_id' => $id,
                'fondo' => $rutaFondo,
                'titulo' => json_encode($titulo, true),
                'logo_principal' => $rutaLogoPrincipal,
                'imagen_raspar' => $rutaImgRaspar,
                'titulo_subir' => $rutaImgTitulo,
                'boton_premios' => json_encode($boton_premios, true),
                'politicas' => json_encode($politica, true),
                'terminos' => json_encode($termino, true),
                'titulo_ganastes' => $rutaImgTituloGanastes
            ]);

        } else { // Actualizar
            $RaspaGana = RaspaGana::findOrFail($isRaspaGana->id);
            $RaspaGana->update([
                'project_id' => $id,
                'fondo' => $rutaFondo,
                'titulo' => json_encode($titulo, true),
                'logo_principal' => $rutaLogoPrincipal,
                'imagen_raspar' => $rutaImgRaspar,
                'titulo_subir' => $rutaImgTitulo,
                'boton_premios' => json_encode($boton_premios, true),
                'politicas' => json_encode($politica, true),
                'terminos' => json_encode($termino, true),
                'titulo_ganastes' => $rutaImgTituloGanastes
            ]);
        }


        // Bloque premios

        if (isset($request->arrayPremiosValue) && !empty($request->arrayPremiosValue)) {
            $arrayPremios = explode(",", $request->arrayPremiosValue);

            foreach ($arrayPremios as $key => $value) {
                $premioValor = explode('|', $value);
                $orden = $premioValor[0];
                $idPremio = $premioValor[1];

                $premios = AwardProject::findOrFail($idPremio);

                if ($premios) {
                    $ruta = $request["premio-subir-".$orden."-url"] != null ? $premios->imagen : '';
                    // Almacenar la imagen en el directorio deseado
                    if ($request->hasFile('premio-subir-'.$orden)) {
                        // Obtener la ruta de la imagen
                        $rutaFav = public_path($premios->imagen); // Suponiendo que la ruta está almacenada en 'ruta'

                        // Eliminar el archivo del sistema
                        if (file_exists($rutaFav) && !empty($premios->imagen)) {
                            unlink($rutaFav); // Eliminar el archivo
                        }

                        $ruta = $request->file('premio-subir-'.$orden)->store('premios', 'public'); // Almacena en storage/app/public/premios
                    }

                    $premios->update([
                        'imagen' => $ruta
                    ]);
                }

            }
        }

        $isRaspaGana = RaspaGana::where('project_id', $id)->first();

        return response()->json($isRaspaGana);
    }

    public function show($hub) {

        // Obtener proyecto
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 1)->first();

        if(!isset($project)){
            return redirect()->route('index');
        }

        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

        if (!session()->has('claveRaspaGana')) {
            return redirect()->route($tipoJuego.'juego.post.registro.raspagana', $hub);
        }

        $idParticipante = session('claveRaspaGana');

        $gameRaspaGana = RaspaGana::where('project_id', $project->id)->first();
        $projectPremio = AwardProject::where('project_id', $project->id)->where('status', 1)->get();
        $premio = $this->obtenerPremio($project->id);

        $data = [
            'idParticipante' => $idParticipante,
            'project' => $project,
            'gameRaspaGana' => $gameRaspaGana,
            'projectPremio' => $projectPremio,
            'premio' => $premio
        ];

        // Borrar la sesión
        session()->forget('claveRaspaGana');

        return view('admin.pages.game_raspa_gana.viewraspagana', compact('data'));
    }

    public function index($hub) {

        // Obtener proyecto
        $project = Project::where('dominio', $hub)->where('status','<>', 0)->where('game_id', 1)->first();

        if(!isset($project)){
            return redirect()->route('index')->with('projecto', 'El juego no existe o no esta publicado.');
        }

        $fechaActual = Carbon::now('America/Lima')->startOfDay();

        if (isset($project->fecha_fin_proyecto) || isset($project->fecha_fin_participar)) {
            if ($fechaActual->toDateTimeString() > $project->fecha_fin_participar || $fechaActual->toDateTimeString() > $project->fecha_fin_proyecto || $project->status == 2) {
                $project->update([
                    'status' => 2
                ]);
                return redirect()->route('index')->with('projecto', 'El juego se encuentra finalizado.');
            }
        }

        // if ($project->project_type_id != 3) { // no es campaña
        //     if (!isset(Auth::user()->id)) {
        //         return redirect()->route('login');
        //     }

        //     $user = User::find(Auth::user()->id);
        // }

        $fechaActualDate = Carbon::now()->toDateString(); // Devuelve la fecha en formato 'Y-m-d'
        if ($project->project_type_id == 3) {
            if (!Auth::guard('admin')->user() && !Auth::guard('xplorer')->user()) {
                return redirect()->route('login');
            }

            if (Auth::guard('admin')->user()) {// Administrador
                $idUser = AsignacionProject::where('project_id', $project->id)
                ->where('fecha_inicio','<=',$fechaActualDate)
                ->where('fecha_fin','>=',$fechaActualDate)
                ->first();
                $user = Xplorer::find($idUser->xplorer_id);
            }
            else if (Auth::guard('xplorer')->user()) {
                $userId = Auth::guard('xplorer')->user()->id;

                $user = Xplorer::find($userId);

                $asignacion = AsignacionProject::where('project_id', $project->id)->where('xplorer_id', $user->id)->get();

                if (count($asignacion) == 0) {
                    return redirect()->route('index')->with('projecto', 'No tiene acceso a este juego.');
                }
            }
            else {
                return redirect()->route('index')->with('projecto', 'No tiene permitido ingresar a este juego.');
            }
        } else {

            if (!Auth::user()) {
                return redirect()->route('login');
            }

            $user = User::find(Auth::user()->id);

        }


        // Vista Proyecto
        ViewProject::create([
            'project_id' => $project->id,
            'codigo' => Str::random(10)
        ]);

        $gameRaspaGana = RaspaGana::where('project_id', $project->id)->first();

        $puntoVenta = DB::table("sales_points")
            ->join('asignacion_projects', 'asignacion_projects.sales_point_id', 'sales_points.id')
            ->where('asignacion_projects.project_id', $project->id)
            ->where('asignacion_projects.xplorer_id', $user->id)
            ->where('asignacion_projects.fecha_inicio','<=',$fechaActualDate)
            ->where('asignacion_projects.fecha_fin','>=',$fechaActualDate)
            ->select('sales_points.*')
            ->distinct()
            ->get()
            ->toArray();

        $data = [
            'project' => $project,
            'user' => $user ?? null,
            'gameRaspaGana' => $gameRaspaGana,
            'puntoVenta' => $puntoVenta
        ];

        return view('admin.pages.game_raspa_gana.gameraspagana', compact('data'));
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

            $archivoBase64 = $request->input('camera_foto');

            $imagenBase64 = explode(',', $archivoBase64)[1];

            // Decodificar la cadena Base64
            $archivo = base64_decode($imagenBase64);

            // Crear un archivo temporal en el sistema
            $tempFile = tmpfile(); // Crea un archivo temporal
            $tempFilePath = stream_get_meta_data($tempFile)['uri']; // Obtén la ruta del archivo temporal
            file_put_contents($tempFilePath, $archivo); // Escribe los datos binarios en el archivo temporal

            // Generar un nombre único para la imagen y la ruta donde se almacenará
            $nombreArchivo = 'boleta_raspa_gana_' . time() . '.jpg';

            // Almacenar la imagen en el directorio deseado
            // $ruta = '';
            // if ($request->hasFile('imagen')) {
            //     $ruta = $request->file('imagen')->store('game_raspa_gana', 'public'); // Almacena en storage/app/public/imagenes
            // }

            $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

            // // Verificar si el codigo ya existe
            // $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

            // if (isset($isCodigo)) {
            //     return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'El N° de LOTE ya existe.')->withInput();
            // }

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
                        return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'El correo ya se encuentra registrado.')->withInput();
                    }

                    $isTelefono = OtherParticipant::where('telefono', $request->telefono)->get();

                    if (count($isTelefono) > 0) {
                        return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'El telefono ya se encuentra registrado.')->withInput();
                    }

                    $otherParticipant = OtherParticipant::create([
                        'nombres' => $request->name,
                        'apellidos' => $request->apellido,
                        'edad' => $request->edad,
                        'telefono' => $request->telefono,
                        'correo' => $request->email,
                        'tipo_doc' => $request->tipo_doc,
                        'nro_documento' => $request->documento,
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
                                return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'El correo ya se encuentra registrado.')->withInput();
                            }

                            $isTelefono = OtherParticipant::where('telefono', $request->telefono)->get();

                            if (count($isTelefono) > 0) {
                                return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'El telefono ya se encuentra registrado.')->withInput();
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

            // Usar 'store' para mover el archivo al directorio 'game_memoria' en el disco 'public'
            $ruta = Storage::disk('public')->put('game_raspa_gana/' . $nombreArchivo, file_get_contents($tempFilePath));

            // Cerrar el archivo temporal
            fclose($tempFile);

            // Obtener la URL pública del archivo almacenado
            $ruta = 'game_raspa_gana/' . $nombreArchivo;

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

            $variable = env('MAIL_USERNAME');
            if (isset($variable) && $variable != null && $variable != '') {
                // Enviar notificacion a administrador
                $notificacion = new NotificacionController();
                $notificacion->notificacionTyC($participant->id);
            }

            session(['punto_venta_raspa' => $request->punto_venta]);

            return redirect()->route($tipoJuego.'juego.view.raspagana', $project->dominio)->with('claveRaspaGana', $participant->id);
        } catch (\Throwable $th) {
            return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'Ocurrio un error inesperado.')->withInput();
        }
    }

    // Verificar ganador
    public function updateGanador(Request $request, $id) {

        $project = Project::where('id', $id)->first();

        if ($project->project_type_id == 3) {
            $premio = PremioPdv::where('id', $request->premio_id)->first();
        } else {
            $premio = AwardProject::where('id', $request->premio_id)->first();
        }

        $participante = Participant::where('id', $request->idParticipante)->first();

        if (!isset($premio)) { // No gano

            $participante->update([
                'ganador' => 0,
            ]);

            $project->update([
                'cantidad_no_premio' => $project->cantidad_no_premio ? intval($project->cantidad_no_premio)- 1 : 0
            ]);

        }else {

            if ($project->project_type_id == 3) {

                $premio = PremioPdv::where('id', $request->premio_id)->first();

                if ($premio->award_project_id != null) {
                    // Gano
                    $participante->update([
                        'ganador' => 1,
                        'award_project_id' => $premio->award_project_id,
                        'fecha_premio' => Carbon::now()
                    ]);
                }

                $premio->update([
                    "qty_premio" =>  $premio->qty_premio - 1
                ]);

            } else { // Gano

                $participante->update([
                    'ganador' => 1,
                    'award_project_id' => $request->premio_id,
                    'fecha_premio' => Carbon::now()
                ]);

                // Reducir el stock del premio
                $premio = AwardProject::findOrFail($request->premio_id);
                $premio->update([
                    "stock" =>  $premio->stock - 1
                ]);
                // Reducir cantidad de premio en asignacion
            }

        }

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function obtenerPremio($projectId) {
        // Obtener todos los premios con su probabilidad
        $project = Project::findOrFail($projectId);
        if ($project->project_type_id == 3) {

            $userId = 0;
            $fechaActualDate = Carbon::now()->toDateString(); // Devuelve la fecha en formato 'Y-m-d'

            if(Auth::guard('admin')->user()) {
                //admin
                $user = AsignacionProject::where('project_id', $project->id)
                ->where('fecha_inicio','<=',$fechaActualDate)
                ->where('fecha_fin','>=',$fechaActualDate)
                ->first();
                $userId = Xplorer::find($user->xplorer_id)->id;
            } else if (Auth::guard('xplorer')->user()) {
                $userId = Auth::guard('xplorer')->user()->id;
            }

            $premios = DB::table('award_projects')
            ->join('premio_pdvs', 'premio_pdvs.award_project_id', 'award_projects.id')
            ->join('asignacion_projects', 'asignacion_projects.id', 'premio_pdvs.asignacion_project_id')
            ->where('asignacion_projects.project_id', $projectId)
            ->where('asignacion_projects.sales_point_id', intval(session('punto_venta_raspa')))
            ->where('asignacion_projects.xplorer_id', $userId)
            ->where('premio_pdvs.qty_premio', '>', 0)
            // ->where('award_projects.status', 1)
            ->select('premio_pdvs.id', 'award_projects.nombre_premio', 'award_projects.imagen', 'premio_pdvs.probabilidad')
            ->get();

            $noPremio =  DB::table('premio_pdvs')
            ->join('asignacion_projects', 'asignacion_projects.id', 'premio_pdvs.asignacion_project_id')
            ->where('premio_pdvs.award_project_id', null)
            ->where('asignacion_projects.project_id', $projectId)
            ->where('asignacion_projects.sales_point_id', intval(session('punto_venta_raspa')))
            ->where('asignacion_projects.xplorer_id', $userId)
            ->where('premio_pdvs.qty_premio', '>', 0)
            // ->where('award_projects.status', 1)
            ->select('premio_pdvs.probabilidad', 'premio_pdvs.id')
            ->first();

            $idNoPremio = isset($noPremio->id) && !empty($noPremio->id) ? $noPremio->id : 0;
            $noPremio = isset($noPremio) && !empty($noPremio) ? $noPremio->probabilidad : null;
        } else {
            $premios = AwardProject::where('project_id', $projectId)->where('status', 1)->where('stock','>',0)->get();
            $idNoPremio = 0;
        }

        $sigueIntentando = KeepTrying::where('project_id', $projectId)->first();

        // Crear un array acumulativo para la probabilidad
        $acumulado = [];
        $total = 0;

        $rutaSigue = '';
        if (isset($sigueIntentando) && !empty($sigueIntentando)) {
            $rutaSigue = $sigueIntentando["imagen"];
        }

        foreach ($premios as $premio) {
            $total += intval($premio->probabilidad);
            $acumulado[] = [
                'id' => $premio->id,
                'nombre' => $premio->nombre_premio,
                'imagen' => $premio->imagen,
                'prob_acum' => $total
            ];
        }
        $total += $project->project_type_id == 3 ? (isset($noPremio) && !empty($noPremio) ? intval($noPremio) : intval($project->prob_no_premio)) : intval($project->prob_no_premio);

        $acumulado[] = [
            'id' => $idNoPremio,
            'nombre' => 'Sigue intentando',
            'imagen' => $rutaSigue,
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
}
