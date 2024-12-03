<?php

namespace App\Http\Controllers;

use App\Models\AwardProject;
use App\Models\Conditional;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    // Metodos de registro
    public function guardarDatosInfoProyecto(Request $request, $id) {

        // Validar los datos entrantes
        $request->validate([
            'name_promo' => 'required|string|max:255',
            'desc_promo' => 'required|string|max:255',
            'marca_select' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $ruta = $request["valor_img_logo"] ?? "";

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('logo_proyecto') && isset($request["logo_proyecto"]) && !empty($request["logo_proyecto"])) {
            if(isset($project->ruta_img) && !empty($project->ruta_img)){
                // Obtener la ruta de la imagen
                $rutaLogo = public_path($project->ruta_img); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaLogo)) {
                    unlink($rutaLogo); // Eliminar el archivo
                }
            }

            $ruta = $request->file('logo_proyecto')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes
        }
        
        $project->update([
            'nombre_promocion' => $request->name_promo,
            'desc_promocion' => $request->desc_promo,
            'marcas' => $request->marca_select,
            'ruta_img' => $ruta
        ]);

        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }

    public function guardarDatosDominio(Request $request, $id) {

        // Validar los datos entrantes
        $request->validate([
            'dominio' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $project->update([
            'dominio' => $request->dominio,
        ]);

        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }

    public function guardarDatosVigencia(Request $request, $id) {

        $project = Project::findOrFail($id);

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $project->update([
            'fecha_ini_proyecto' => $request->fecha_ini_proyecto,
            'fecha_fin_proyecto' => $request->fecha_fin_proyecto,
            'fecha_ini_participar' => empty($request->fecha_ini_participar) ? null : $request->fecha_ini_participar,
            'fecha_fin_participar' => empty($request->fecha_fin_participar) ? null : $request->fecha_fin_participar,
        ]);

        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }

    public function guardarDatosEstilos(Request $request, $id) {

        // Validar que se suba un archivo de imagen
        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        $project = Project::findOrFail($id);

        $ruta = $project->ruta_fav;

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $ruta = $request["valor_img"];

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('imagen') && isset($request["imagen"]) && !empty($request["imagen"])) {
            if(isset($project->ruta_fav) && !empty($project->ruta_fav)){
                // Obtener la ruta de la imagen
                $rutaFav = public_path($project->ruta_fav); // Suponiendo que la ruta está almacenada en 'ruta'

                // Eliminar el archivo del sistema
                if (file_exists($rutaFav)) {
                    unlink($rutaFav); // Eliminar el archivo
                }
            }

            $ruta = $request->file('imagen')->store('imagenes', 'public'); // Almacena en storage/app/public/imagenes
        }

        $request->merge(['ruta_fav' => $ruta]);

        $project->update([
            'tipo_letra' => $request->tipo_letra,
            'titulo_pestana' => $request->titulo_pestana,
            'ruta_fav' => $request->ruta_fav,
        ]);

        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }

    public function guardarDatosPremios(Request $request, $id) {

        // Validar los datos entrantes
        $request->validate([
            'cantidad_premio' => 'required|min:1',
        ]);

        $arrayPremio = json_decode($request->lPremioConcat, true);

        $project = Project::findOrFail($id);

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $project->update([
            'cantidad_premio' => $request->cantidad_premio,
            'prob_no_premio' => $request->prob_no_premio,
        ]);

        // Crear premios
        $premio = AwardProject::where('project_id', $id);

        $premio->delete();

        foreach ($arrayPremio as $key => $value) {
            $orden = $value[0];
            $name = $value[1];
            $stock = $value[2];
            $probabilidad = $value[3];

            AwardProject::create([
                'project_id' => $id, 
                'orden' => $orden, 
                'nombre_premio' => $name, 
                'stock' => $stock, 
                'probabilidad' => $probabilidad, 
            ]);
        }

        return response()->json(['success' => true, 'message' => $arrayPremio]);
    }

    public function obtenerPremio($id) {

        $premio = AwardProject::where('project_id', $id)->get();
        $project = Project::findOrFail($id);
        
        $premios = $premio->map(function ($pre) {
            return [
                'nro_premio' => $pre->orden,
                'nombre_premio' => $pre->nombre_premio ,
                'stock' => $pre->stock,
                'probabilidad' => $pre->probabilidad,
            ];
        });

        $data = [
            'premio' => $premio,
            'project' => $project,
        ];

        return response()->json(compact('data'));
    }

    public function guardarDatosEstado(Request $request, $id) {

        $project = Project::findOrFail($id);

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $project->update($request->all());

        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }

    public function guardarDatosCondicion(Request $request, $id) {

        $arrayCondicion = json_decode($request->condicion_str, true);

        $condicional = Conditional::where('project_id', $id);

        $condicional->delete();

        foreach ($arrayCondicion as $key => $value) {
            $tipo_condicion = $value[0];
            $tipo_producto = $value[1];
            $cantidad_condicion = $value[2];

            Conditional::create([
                'project_id' => $id, 
                'tipo_condicion' => $tipo_condicion, 
                'tipo_producto' => $tipo_producto, 
                'cantidad_condicion' => $cantidad_condicion
            ]);
        }
        
        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }

    public function obtenerCondicion($id) {
        
        $condicional = Conditional::where('project_id', $id)->get();

        return response()->json($condicional);
    }
}
