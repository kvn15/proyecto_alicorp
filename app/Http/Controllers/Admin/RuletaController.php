<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
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
        $rutaFondo = isset($isRuleta) && !empty($isRuleta->fondo) ?  $isRuleta->fondo : '';
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
        $rutaLogoPrincipal = isset($isRuleta) && !empty($isRuleta->logo_inicio) ?  $isRuleta->logo_inicio : '';
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
        $rutaLogoGame = isset($isRuleta) && !empty($isRuleta->logo_juego) ?  $isRuleta->logo_juego : '';
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
        $rutaTituloPremio = isset($isRuleta) && !empty($isRuleta->titulo_premio) ?  $isRuleta->titulo_premio : '';
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
            ]);
        }

        $isRuleta = Roulette::where('project_id', $id)->first();

        return response()->json($isRuleta);
    }

    public function storeImgPremio(Request $request, $id) {
    
        // Obtener los premios
        $premio = AwardProject::findOrFail($id);

        // insertar imagen
        $ruta = !empty($premio->imagen) ?  $premio->imagen : '';
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
        $premioRuleta = DB::table('award_projects')->where('project_id', $project->id)->select('id', 'nombre_premio as name', DB::raw("CONCAT('/storage/', imagen) AS img"))->get();
        $premio = $this->obtenerPremio($project->id);

        $data = [
            'idParticipante' => $idParticipante,
            'project' => $project,
            'gameRuleta' => $gameRuleta,
            'projectPremio' => $projectPremio,
            'premio' => $premio,
            'premioRuleta' => $premioRuleta
        ];

        // Borrar la sesión
        session()->forget('claveRuleta');

        return view('admin.pages.ruleta.ruleta', compact('data'));
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

    // 
    public function index($hub) {
        
        // Obtener proyecto
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 2)->first();

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
        $gameRuleta = Roulette::where('project_id', $project->id)->first();

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
            'gameRuleta' => $gameRuleta,
            'puntoVenta' => $puntoVenta
        ];

        return view('admin.pages.ruleta.registroruleta', compact('data'));
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
            $ruta = $request->file('imagen')->store('ruleta', 'public'); // Almacena en storage/app/public/imagenes
        }
        $tipoJuego = $project->project_type_id == 2 ? 'juegoWeb.' : 'juegoCampana.';

        // Verificar si el codigo ya existe
        $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

        if (isset($isCodigo)) {
            return redirect()->route($tipoJuego.'juego.view.registro.ruleta', $project->dominio)->with('mensaje', 'El N° de LOTE ya existe.');;
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

        return redirect()->route($tipoJuego.'juego.view.ruleta', $project->dominio)->with('claveRuleta', $participant->id);
    }
}
