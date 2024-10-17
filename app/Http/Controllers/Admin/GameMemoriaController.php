<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
use App\Models\GameView;
use App\Models\Participant;
use App\Models\Project;
use App\Models\User;
use App\Models\ViewProject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GameMemoriaController extends Controller
{
    
    public function index($hub) {

        $project = Project::where('dominio', $hub)->where('status', 1)->where('project_type_id', 2)->where('game_id', 3)->first();

        if(!isset($project)){
            return redirect()->route('index');
        }

        if (!isset(Auth::user()->id)) {
            return redirect()->route('login');
        }

        $user = User::find(Auth::user()->id);

        $data = [
            'project' => $project,
            'user' => $user,
        ];

        return view('admin.pages.game_memoria.gamememoria', compact('data'));
    }

    public function store(Request $request, $id) {

        $project = Project::where('id', $id)->first();

        // Almacenar la imagen en el directorio deseado
        $ruta = '';
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Verificar si el codigo ya existe
        $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

        if (isset($isCodigo)) {
            return redirect()->route('juego.view.registro', $project->dominio)->with('mensaje', 'El N° de LOTE ya existe.');;
        }
        
        $participant = new Participant();
        $participant->project_id = $id;
        $participant->user_id = Auth::user()->id;
        $participant->terminos_condiciones = 1;
        $participant->codigo = $request->codigo;
        $participant->participaciones = 1;
        $participant->file_producto = $ruta;
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

        return redirect()->route('juego.view.memoria', $project->dominio)->with('claveMemoria', $participant->id);
    }

    public function show($hub) {
        $project = Project::where('dominio', $hub)->where('status', 1)->where('game_id', 3)->first();
        
        if(!isset($project)){
            return redirect()->route('index');
        }

        if (!session()->has('claveMemoria')) {
            return redirect()->route('juego.view.registro', $hub);
        }

        $idParticipante = session('claveMemoria');
        $game = GameView::where('project_id', $project->id)->first();
        $premio = $this->obtenerPremio($project->id);

        $data = [
            'idParticipante' => $idParticipante,
            'project' => $project,
            'gameMemoria' => $game,
            'premio' => $premio
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

        $existLanding = GameView::where('project_id', $id)->first();
        $gameArray = json_decode($existLanding->premio_img ?? "", true);
        $principalArray = json_decode($existLanding->principal ?? "", true);
        $premioArray = json_decode($existLanding->premio ?? "", true);

        $rutaBanner = isset($principalArray["banner"])  && !empty($principalArray["banner"]) ? $principalArray["banner"] : "";
        if ($request->hasFile('banner-subir')) {
            $rutaBanner = $request->file('banner-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        $principal["banner"] = $rutaBanner; 

        $rutalogo = isset($principalArray["logo-subir"])  && !empty($principalArray["logo-subir"]) ? $principalArray["logo-subir"] : "";
        if ($request->hasFile('logo-subir')) {
            $rutalogo = $request->file('logo-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        $principal["logo-subir"] = $rutalogo;

        $rutaGano = isset($premioArray["gano-subir"])  && !empty($premioArray["gano-subir"]) ? $premioArray["gano-subir"] : "";;
        if ($request->hasFile('gano-subir')) {
            $rutaGano = $request->file('gano-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        $premio["gano-subir"] = $rutaGano; 
 
        
        $rutaImg1 = isset($gameArray[0]['img'])  && !empty($gameArray[0]['img']) ? $gameArray[0]['img'] : "";
        if ($request->hasFile('imagen-1-subir')) {
            $rutaImg1 = $request->file('imagen-1-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg2 = isset($gameArray[1]['img'])  && !empty($gameArray[1]['img']) ? $gameArray[1]['img'] : "";
        if ($request->hasFile('imagen-2-subir')) {
            $rutaImg2 = $request->file('imagen-2-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg3 = isset($gameArray[2]['img'])  && !empty($gameArray[2]['img']) ? $gameArray[2]['img'] : "";
        if ($request->hasFile('imagen-3-subir')) {
            $rutaImg3 = $request->file('imagen-3-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg4 = isset($gameArray[3]['img'])  && !empty($gameArray[3]['img']) ? $gameArray[3]['img'] : "";
        if ($request->hasFile('imagen-4-subir')) {
            $rutaImg4 = $request->file('imagen-4-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        } 
        
        $rutaImg5 = isset($gameArray[4]['img'])  && !empty($gameArray[4]['img']) ? $gameArray[4]['img'] : "";
        if ($request->hasFile('imagen-5-subir')) {
            $rutaImg5 = $request->file('imagen-5-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $rutaImg6 = isset($gameArray[5]['img'])  && !empty($gameArray[5]['img']) ? $gameArray[5]['img'] : "";
        if ($request->hasFile('imagen-6-subir')) {
            $rutaImg6 = $request->file('imagen-6-subir')->store('game_memoria', 'public'); // Almacena en storage/app/public/imagenes
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

        if (!isset($existLanding)) {
            $landing = new GameView();
            $landing->project_id = $id;
            $landing->principal = json_encode($principal, true);
            $landing->premio = json_encode($premio, true);
            $landing->premio_img = json_encode($premio_img, true);
            $landing->html_preview = '';
            $landing->html_origin = '';
            $landing->html_end = '';
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
        $premios = AwardProject::where('project_id', $projectId)->get();
        $project = Project::findOrFail($projectId);
    
        // Crear un array acumulativo para la probabilidad
        $acumulado = [];
        $total = 0;

        $acumulado[] = [
            'id' => 0,
            'nombre' => 'Sigue intentando',
            'imagen' => '',
            'prob_acum' => $total + $project->prob_no_premio
        ];
    
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
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
