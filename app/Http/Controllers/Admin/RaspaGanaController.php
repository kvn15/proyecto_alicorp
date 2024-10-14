<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
use App\Models\Project;
use App\Models\RaspaGana;
use App\Models\ViewProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
                'titulo' => $titulo,
                'logo_principal' => $rutaLogoPrincipal,
                'imagen_raspar' => $rutaImgRaspar,
                'titulo_subir' => $rutaImgTitulo,
                'boton_premios' => $boton_premios,
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

        $gameRaspaGana = RaspaGana::where('project_id', $project->id)->first();
        $projectPremio = AwardProject::where('project_id', $project->id)->get();
        $premio = $this->obtenerPremio($project->id);

        $data = [
            'project' => $project,
            'gameRaspaGana' => $gameRaspaGana,
            'projectPremio' => $projectPremio,
            'premio' => $premio
        ];

        // Vista Proyecto
        ViewProject::create([
            'project_id' => $project->id,
            'codigo' => Str::random(10)
        ]);

        return view('admin.pages.game_raspa_gana.viewraspagana', compact('data'));
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
}
