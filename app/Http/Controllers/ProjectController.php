<?php

namespace App\Http\Controllers;

use App\Models\AwardProject;
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

        $project->update([
            'nombre_promocion' => $request->name_promo,
            'desc_promocion' => $request->desc_promo,
            'marcas' => $request->marca_select,
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

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('imagen')) {
            // Obtener la ruta de la imagen
            $rutaFav = public_path($project->ruta_fav); // Suponiendo que la ruta está almacenada en 'ruta'

            // Eliminar el archivo del sistema
            if (file_exists($rutaFav)) {
                unlink($rutaFav); // Eliminar el archivo
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
            $probabilidad = $value[2];

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
        
        $premios = $premio->map(function ($pre) {
            return [
                'nro_premio' => $pre->orden,
                'nombre_premio' => $pre->nombre_premio ,
                'stock' => $pre->stock,
                'probabilidad' => $pre->probabilidad,
            ];
        });

        return response()->json(compact('premios'));
    }

    public function guardarDatosEstado(Request $request, $id) {

        $project = Project::findOrFail($id);

        if (!isset($project)) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $project->update($request->all());

        return response()->json(['success' => true, 'message' => 'Cambios guardados correctamente.']);
    }
}
