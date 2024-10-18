<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
use App\Models\Project;
use App\Models\Roulette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $gameRuleta = Roulette::where('project_id', $project->id)->first();
        $projectPremio = AwardProject::where('project_id', $project->id)->get();
        $premioRuleta = DB::table('award_projects')->where('project_id', $project->id)->select('nombre_premio as name', DB::raw("CONCAT('/storage/', imagen) AS img"))->get();
        $premio = $this->obtenerPremio($project->id);

        $data = [
            'project' => $project,
            'gameRuleta' => $gameRuleta,
            'projectPremio' => $projectPremio,
            'premio' => $premio,
            'premioRuleta' => $premioRuleta
        ];

        return view('admin.pages.ruleta.ruleta', compact('data'));
    }

    public function obtenerPremio($projectId) {
        // Obtener todos los premios con su probabilidad
        $premios = AwardProject::where('project_id', $projectId)->get();
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
