<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
use Illuminate\Http\Request;

class RuletaController extends Controller
{
    public function storePersonalizar(Request $request, $id) {

        

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
}
