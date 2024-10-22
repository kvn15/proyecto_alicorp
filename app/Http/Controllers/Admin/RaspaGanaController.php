<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
use App\Models\Participant;
use App\Models\Project;
use App\Models\RaspaGana;
use App\Models\User;
use App\Models\ViewProject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaspaGanaController extends Controller
{
    public function storePersonalizar(Request $request, $id) {

        // Actualizar o crear datos del juego
        $isRaspaGana = RaspaGana::where('project_id', $id)->first();

        // Guardar Imagenes principales
        
        // Fondo
        $rutaFondo = isset($isRaspaGana) && !empty($isRaspaGana->fondo) ?  $isRaspaGana->fondo : '';
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
        $rutaLogoPrincipal = isset($isRaspaGana) && !empty($isRaspaGana->logo_principal) ?  $isRaspaGana->logo_principal : '';
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
        $rutaImgRaspar = isset($isRaspaGana) && !empty($isRaspaGana->imagen_raspar) ?  $isRaspaGana->imagen_raspar : '';
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
        $rutaImgTitulo = isset($isRaspaGana) && !empty($isRaspaGana->titulo_subir) ?  $isRaspaGana->titulo_subir : '';
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
            ]);
        }
        
        
        // Bloque premios
        $arrayPremios = explode(",", $request->arrayPremiosValue);

        foreach ($arrayPremios as $key => $value) {
            $premioValor = explode('|', $value);
            $orden = $premioValor[0];
            $idPremio = $premioValor[1];

            $premios = AwardProject::findOrFail($idPremio);
            
            if ($premios) {
                $ruta = $premios->imagen;
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
        $projectPremio = AwardProject::where('project_id', $project->id)->get();
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
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 1)->first();

        if(!isset($project)){
            return redirect()->route('index');
        }

        $fechaActual = Carbon::now('America/Lima')->startOfDay();
        if (isset($project->fecha_fin_proyecto)) {
            if ($fechaActual->toDateTimeString() > $project->fecha_fin_proyecto) {
                return redirect()->route('index')->with('projecto', 'El juego se encuentra finalizado.');
            }
        }

        if (!isset(Auth::user()->id)) {
            return redirect()->route('login');
        }
        // Vista Proyecto
        ViewProject::create([
            'project_id' => $project->id,
            'codigo' => Str::random(10)
        ]);
        
        $user = User::find(Auth::user()->id);
        $gameRaspaGana = RaspaGana::where('project_id', $project->id)->first();

        $puntoVenta = DB::table("projects")
        ->join('asignacion_projects', 'asignacion_projects.project_id', '=', 'projects.id')
        ->join('sales_points', 'sales_points.id', '=', 'asignacion_projects.sales_point_id')
        ->select('sales_points.id', 'sales_points.name')
        ->where('projects.id', $project->id)
        ->distinct()
        ->get()->toArray();

        $data = [
            'project' => $project,
            'user' => $user,
            'gameRaspaGana' => $gameRaspaGana,
            'puntoVenta' => $puntoVenta
        ];

        return view('admin.pages.game_raspa_gana.gameraspagana', compact('data'));
    }

    public function store(Request $request, $id) {

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
            $ruta = $request->file('imagen')->store('game_raspa_gana', 'public'); // Almacena en storage/app/public/imagenes
        }
        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

        // Verificar si el codigo ya existe
        $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

        if (isset($isCodigo)) {
            return redirect()->route($tipoJuego.'juego.view.registro.raspagana', $project->dominio)->with('mensaje', 'El N° de LOTE ya existe.');;
        }
        
        $participant = new Participant();
        $participant->project_id = $id;
        $participant->user_id = Auth::user()->id;
        $participant->terminos_condiciones = 1;
        $participant->codigo = $request->codigo;
        $participant->codigo_valido = 1;
        $participant->participaciones = 1;
        $participant->file_producto = $ruta;
        $participant->punto_entrega = isset($request->punto_venta) && !empty($request->punto_venta) ? $request->punto_venta : null;
        $participant->save();

        $user= User::findOrFail(Auth::user()->id);

        // Actualizar usuario
        $user->update([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'tipo_documento' => $request->tipo_doc,
            'documento' => $request->documento,
            'edad' => $request->edad,
            'telefono' => $request->telefono
        ]);

        $uuid = Str::uuid()->toString();

        return redirect()->route($tipoJuego.'juego.view.raspagana', $project->dominio)->with('claveRaspaGana', $participant->id);
    }

    // Verificar ganador
    public function updateGanador(Request $request, $id) {
        
        $premio = AwardProject::where('id', $request->premio_id)->first();

        $participante = Participant::where('id', $request->idParticipante)->first();

        if (!isset($premio)) { // No gano
            $participante->update([
                'ganador' => 0,
            ]);
        }else { // Gano
            $participante->update([
                'ganador' => 1,
                'award_project_id ' => $request->premio_id,
                'fecha_premio' => Carbon::now()
            ]);

            // Reducir el stock del premio
            $premio = AwardProject::findOrFail($request->premio_id);
            $premio->update([
                "stock" =>  $premio->stock - 1
            ]);
            // Reducir cantidad de premio en asignacion
        }

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function obtenerPremio($projectId) {
        // Obtener todos los premios con su probabilidad
        $premios = AwardProject::where('project_id', $projectId)->where('stock','>',0)->get();
        $project = Project::findOrFail($projectId);
    
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
}
