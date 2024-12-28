<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsignacionProject;
use App\Models\AwardProject;
use App\Models\GameView;
use App\Models\KeepTrying;
use App\Models\OtherParticipant;
use App\Models\Participant;
use App\Models\PremioPdv;
use App\Models\Project;
use App\Models\User;
use App\Models\ViewProject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GameMemoriaController extends Controller
{
    
    public function index($hub) {

        $project = Project::where('dominio', $hub)->where('status', 1)->whereIn('project_type_id', [2,3])->where('game_id', 3)->first();

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

        $game = GameView::where('project_id', $project->id)->first();

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
            'gameMemoria' => $game,
            'puntoVenta' => $puntoVenta
        ];

        return view('admin.pages.game_memoria.gamememoria', compact('data'));
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
                $ruta = $request->file('imagen')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
            }

            // Verificar si el codigo ya existe
            $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

            $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

            if (isset($isCodigo)) {
                return redirect()->route($tipoJuego.'juego.view.registro', $project->dominio)->with('mensaje', 'El N° de LOTE ya existe.')->withInput();
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
                        return redirect()->route($tipoJuego.'juego.view.registro', $project->dominio)->with('mensaje', 'El correo ya se encuentra registrado.')->withInput();
                    }

                    $isTelefono = OtherParticipant::where('telefono', $request->telefono)->get();

                    if (count($isTelefono) > 0) {
                        return redirect()->route($tipoJuego.'juego.view.registro', $project->dominio)->with('mensaje', 'El telefono ya se encuentra registrado.')->withInput();
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
                                return redirect()->route($tipoJuego.'juego.view.registro', $project->dominio)->with('mensaje', 'El correo ya se encuentra registrado.')->withInput();
                            }

                            $isTelefono = OtherParticipant::where('telefono', $request->telefono)->get();

                            if (count($isTelefono) > 0) {
                                return redirect()->route($tipoJuego.'juego.view.registro', $project->dominio)->with('mensaje', 'El telefono ya se encuentra registrado.')->withInput();
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

            session(['punto_venta_memoria' => $request->punto_venta]);

            return redirect()->route($tipoJuego.'juego.view.memoria', $project->dominio)->with('claveMemoria', $participant->id);
        } catch (\Throwable $th) {
            return redirect()->route($tipoJuego.'juego.view.registro', $project->dominio)->with('mensaje', 'Ocurrio un error inesperado.')->withInput();
        }
    }

    public function show($hub) {
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 3)->first();
        
        if(!isset($project)){
            return redirect()->route('index');
        }
        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

        if (!session()->has('claveMemoria')) {
            return redirect()->route($tipoJuego.'juego.view.registro', $hub);
        }

        $idParticipante = session('claveMemoria');
        $game = GameView::where('project_id', $project->id)->first();
        $premio = $this->obtenerPremio($project->id);
        $sigueIntentando = KeepTrying::where('project_id', $project->id)->first();

        $data = [
            'idParticipante' => $idParticipante,
            'project' => $project,
            'gameMemoria' => $game,
            'premio' => $premio,
            'sigueIntentando' => $sigueIntentando
        ];

        // Vista Proyecto
        ViewProject::create([
            'project_id' => $project->id,
            'codigo' => Str::random(10)
        ]);

        // Borrar la sesión
        session()->forget('claveMemoria');

        return view('admin.pages.game_memoria.viewmemoria', compact('data'));
    }

    public function storePersonalizar(Request $request, $id) {

        $principal = [
            "banner" => '',
            'bold-titulo-parrafo' => isset($request['bold-titulo-parrafo']) ? 1 : 0,
            'italic-titulo-parrafo' => isset($request['italic-titulo-parrafo']) ? 1 : 0,
            "texto-header" => $request["texto-header"],
            "tamanoTexto" => $request["tamanoTexto"],
            "alineacionTexto" => $request["alineacionTexto"],
            "color-texto-input" => $request["color-texto-input"],
            'logo-subir' => '',
        ];

        $premio = [
            'gano-subir' => '',
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

        $existLanding = GameView::where('project_id', $id)->first();
        $gameArray = json_decode($existLanding->premio_img ?? "", true);
        $principalArray = json_decode($existLanding->principal ?? "", true);
        $premioArray = json_decode($existLanding->premio ?? "", true);

        $rutaBanner = isset($principalArray["banner"])  && !empty($principalArray["banner"]) && $request["banner-subir-url"] != null ? $principalArray["banner"] : "";
        if ($request->hasFile('banner-subir')) {
            $rutaBanner = $request->file('banner-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        $principal["banner"] = $rutaBanner; 

        $rutalogo = isset($principalArray["logo-subir"])  && !empty($principalArray["logo-subir"]) && $request["logo-subir-url"] != null ? $principalArray["logo-subir"] : "";
        if ($request->hasFile('logo-subir')) {
            $rutalogo = $request->file('logo-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        $principal["logo-subir"] = $rutalogo;

        $rutaGano = isset($premioArray["gano-subir"])  && !empty($premioArray["gano-subir"]) && $request["gano-subir-url"] != null ? $premioArray["gano-subir"] : "";;
        if ($request->hasFile('gano-subir')) {
            $rutaGano = $request->file('gano-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        $premio["gano-subir"] = $rutaGano; 
 
        
        $rutaImg1 = isset($gameArray[0]['img'])  && !empty($gameArray[0]['img']) && $request["imagen-1-subir-url"] != null ? $gameArray[0]['img'] : "";
        if ($request->hasFile('imagen-1-subir')) {
            $rutaImg1 = $request->file('imagen-1-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg2 = isset($gameArray[1]['img'])  && !empty($gameArray[1]['img']) && $request["imagen-2-subir-url"] != null ? $gameArray[1]['img'] : "";
        if ($request->hasFile('imagen-2-subir')) {
            $rutaImg2 = $request->file('imagen-2-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg3 = isset($gameArray[2]['img'])  && !empty($gameArray[2]['img']) && $request["imagen-3-subir-url"] != null ? $gameArray[2]['img'] : "";
        if ($request->hasFile('imagen-3-subir')) {
            $rutaImg3 = $request->file('imagen-3-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg4 = isset($gameArray[3]['img'])  && !empty($gameArray[3]['img']) && $request["imagen-4-subir-url"] != null ? $gameArray[3]['img'] : "";
        if ($request->hasFile('imagen-4-subir')) {
            $rutaImg4 = $request->file('imagen-4-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        } 
        
        $rutaImg5 = isset($gameArray[4]['img'])  && !empty($gameArray[4]['img']) && $request["imagen-5-subir-url"] != null ? $gameArray[4]['img'] : "";
        if ($request->hasFile('imagen-5-subir')) {
            $rutaImg5 = $request->file('imagen-5-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg6 = isset($gameArray[5]['img'])  && !empty($gameArray[5]['img']) && $request["imagen-6-subir-url"] != null ? $gameArray[5]['img'] : "";
        if ($request->hasFile('imagen-6-subir')) {
            $rutaImg6 = $request->file('imagen-6-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }

        $sigueIntentandoBD = KeepTrying::where('project_id', $id)->first();
        $sigueIntentando = isset($sigueIntentandoBD["imagen"])  && !empty($sigueIntentandoBD["imagen"]) && $request["sigue-intentando-subir-url"] != null ? $sigueIntentandoBD["imagen"] : "";;
        if ($request->hasFile('sigue-intentando-subir')) {
            $sigueIntentando = $request->file('sigue-intentando-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
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
        
        
        $rutaGano = '';

        $premio_img = [
            [
                'valor' => 1,
                'img' => $rutaImg1
            ],
            [
                'valor' => 2,
                'img' => $rutaImg2
            ],
            [
                'valor' => 3,
                'img' => $rutaImg3
            ],
            [
                'valor' => 4,
                'img' => $rutaImg4
            ],
            [
                'valor' => 5,
                'img' => $rutaImg5
            ],
            [
                'valor' => 6,
                'img' => $rutaImg6
            ]
        ];

        // Bloque premios

        if (isset($request->arrayPremiosValue) && !empty($request->arrayPremiosValue)) {
            $arrayPremios = explode(",", $request->arrayPremiosValue);

            foreach ($arrayPremios as $key => $value) {
                $premioValor = explode('|', $value);
                $orden = $premioValor[0];
                $idPremio = $premioValor[1];

                $premios = AwardProject::findOrFail($idPremio);
                
                if ($premios) {
                    $ruta = $request["premio-subir-".$orden."-url"] != null ?  $premios->imagen : "";
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

        if (!isset($existLanding)) {
            $landing = new GameView();
            $landing->project_id = $id;
            $landing->principal = json_encode($principal, true);
            $landing->premio = json_encode($premio, true);
            $landing->premio_img = json_encode($premio_img, true);
            $landing->html_preview = '';
            $landing->html_origin = '';
            $landing->html_end = '';
            $landing->politicas = json_encode($politica, true);
            $landing->terminos = json_encode($termino, true);
            $landing->save();
        } else {
            $landing = GameView::findOrFail($existLanding->id);
            $existLanding->update([
                'principal' => json_encode($principal, true),
                'premio' => json_encode($premio, true),
                'premio_img' => json_encode($premio_img, true),
                'html_preview' => '',
                'html_origin' => '',
                'html_end' => '',
                'politicas' => json_encode($politica, true),
                'terminos' => json_encode($termino, true),
            ]);
        }

        return response()->json([
            'principal' => $principal,
            'premio' => $premio,
            'premio_img' => $premio_img
        ]);
    }

    public function storeHtml(Request $request, $id) {
        
        $existLanding = GameView::where('project_id', $id)->first();

        if (!isset($existLanding)) {
            return response()->json(['message' => 'Juego Memoria no encontrada.'], 404);
        }

        $existLanding->update([
            'html_preview' => $request->html,
            'html_origin' => $request->html,
            'html_end' => $request->html,
        ]);
        
        return response()->json(['message' => 'Juego Memoria guardada.'], 201);
    }

    public function obtenerPremio($projectId) {
        // Obtener todos los premios con su probabilidad
        $project = Project::findOrFail($projectId);
        if ($project->project_type_id == 3) {
            $premios = DB::table('award_projects')
            ->join('premio_pdvs', 'premio_pdvs.award_project_id', 'award_projects.id')
            ->join('asignacion_projects', 'asignacion_projects.id', 'premio_pdvs.asignacion_project_id')
            ->where('asignacion_projects.project_id', $projectId)
            ->where('asignacion_projects.sales_point_id', intval(session('punto_venta_memoria')))
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
        }else { // Gano

            if ($project->project_type_id == 3) {

                // Gano
                $participante->update([
                    'ganador' => 1,
                    'award_project_id' => $premio->award_project_id,
                    'fecha_premio' => Carbon::now()
                ]);
                
                $premio = PremioPdv::where('id', $request->premio_id)->first();
                $premio->update([
                    "qty_premio" =>  $premio->qty_premio - 1
                ]);
                
            } else {
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
            }
            
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
