<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Landing;
use App\Models\Project;
use App\Models\ViewProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ViewLandingController extends Controller
{
    //
    public function index($hub) {
        $project = Project::where('dominio',$hub)->where('status', 1)->first();
        
        if(!isset($project)){
            return back();
        }

        $landing = Landing::where('project_id', $project->id)->first();

        $landingPage = [
            'project' => $project,
            'landing' => $landing,
        ];

        // Vista Proyecto
        ViewProject::create([
            'project_id' => $project->id,
            'codigo' => Str::random(10)
        ]);

        return view('admin.pages.landing_public.viewlanding', compact('landingPage'));
    }

    public function store(Request $request, $id) {

        // Creamos el json para el encabezado
        $encabezado = [
            'color_menu' => $request['color-menu'],
            'logo_subir' => '',
            'bold_menu' => isset($request['bold-menu']) ? 1 : 0,
            'italic_menu' => isset($request['italic-menu']) ? 1 : 0,
            'tamanoMenu' => $request->tamanoMenu,
            'color_navegacion' => $request->color_navegacion,
            'color_navegacion_input_hover' => $request->color_navegacion_input_hover,
            'navegacion_1' => $request->navegacion_1,
            'direccionar_1' => $request->direccionar_1,
            'navegacion_2' => $request->navegacion_2,
            'direccionar_2' => $request->direccionar_2,
            'navegacion_3' => $request->navegacion_3,
            'direccionar_3' => $request->direccionar_3,
            'navegacion_4' => $request->navegacion_4,
            'direccionar_4' => $request->direccionar_4,
        ];
        $pagina_principal = [
            'distribucion' => $request["distribucion"],
            'banner_subir' => '',
            'fondo_landing' => $request["fondo_landing"],
            'bold-titulo-header' => isset($request['bold-titulo-header']) ? 1 : 0,
            'italic-titulo-header' => isset($request['italic-titulo-header']) ? 1 : 0,
            'input-titulo-header' => $request["input-titulo-header"],
            'tamanoTitulo' => $request["tamanoTitulo"],
            'alineacionTitulo' => $request["alineacionTitulo"],
            'color-titulo' => $request["color-titulo"],
            'bold-titulo-parrafo' => isset($request['bold-titulo-parrafo']) ? 1 : 0,
            'italic-titulo-parrafo' => isset($request['italic-titulo-parrafo']) ? 1 : 0,
            'texto-header' => $request['texto-header'],
            'tamanoTexto' => $request["tamanoTexto"],
            'alineacionTexto' => $request["alineacionTexto"],
            'color-texto' => $request["color-texto"],
            'imagen-subir' => '',
            'direccionar_boton_header' => $request["direccionar_boton_header"],
            'bold-boton-parrafo' => isset($request['bold-boton-parrafo']) ? 1 : 0,
            'italic-boton-header' => isset($request['italic-boton-header']) ? 1 : 0,
            'tamanoBotonHeader' => $request["tamanoBotonHeader"],
            'color-boton-header' => $request["color-boton-header"]
        ];

        $como_participar = [
            'border-input-como' => $request["border-input-como"],
            'bold-titulo-como' => isset($request['bold-titulo-como']) ? 1 : 0,
            'italic-titulo-como' => isset($request['italic-titulo-como']) ? 1 : 0,
            'input-titulo-como' => $request["input-titulo-como"],
            'tamanoTituloComo' => $request["tamanoTituloComo"],
            'color-titulo-como' => $request["color-titulo-como"],
            'participar_1' => '',
            'participar_2' => '',
            'participar_3' => '',
            'bold-boton-como' => isset($request['bold-boton-como']) ? 1 : 0,
            'italic-boton-como' => isset($request['italic-boton-como']) ? 1 : 0,
            'input-boton-como' => $request["input-boton-como"],
            'tamanoBotonComo' => $request["tamanoBotonComo"],
            'color-boton-como' => $request["color-boton-como"]
        ];

        $formulario = [
            'border-formulario' => $request["border-formulario"],
            'bold-titulo-formulario' => isset($request['bold-titulo-formulario']) ? 1 : 0,
            'italic-titulo-formulario' => isset($request['italic-titulo-formulario']) ? 1 : 0,
            'input-titulo-formulario' => $request["input-titulo-formulario"],
            'tamanoTituloFormulario' => $request["tamanoTituloFormulario"],
            'color-titulo-formulario' => $request["color-titulo-formulario"],
            'color-label-formulario' => $request["color-label-formulario"],
            'bold-boton-formulario' => isset($request['bold-boton-formulario']) ? 1 : 0,
            'italic-boton-formulario' => isset($request['italic-boton-formulario']) ? 1 : 0,
            'input-boton-formulario' => $request["input-boton-formulario"],
            'tamanoBotonFormulario' => $request["tamanoBotonFormulario"],
            'color-boton-formulario' => $request["color-boton-formulario"]
        ];

        $ganador = [
            'border-ganador' => $request["border-ganador"],
            'bold-titulo-ganador' => isset($request['bold-titulo-ganador']) ? 1 : 0,
            'italic-titulo-ganador' => isset($request['italic-titulo-ganador']) ? 1 : 0,
            'input-titulo-ganador' => $request["input-titulo-ganador"],
            'tamanoTituloGanador' => $request["tamanoTituloGanador"],
            'color-titulo-ganador' => $request["color-titulo-ganador"],
            'color-lista-ganador' => $request["color-lista-ganador"]
        ];

        $pregunta = [
            'border-pregunta' => $request["border-pregunta"],
            'bold-titulo-pregunta' => isset($request['bold-titulo-pregunta']) ? 1 : 0,
            'italic-titulo-pregunta' => isset($request['italic-titulo-pregunta']) ? 1 : 0,
            'input-titulo-pregunta' => $request["input-titulo-pregunta"],
            'tamanoTituloPregunta' => $request["tamanoTituloPregunta"],
            'color-titulo-pregunta' => $request["color-titulo-pregunta"],
            'color-text-pregunta' => $request["color-text-pregunta"],
            'color-borde-pregunta' => $request["color-borde-pregunta"],
            'pregunta1' => $request["pregunta1"],
            'respuesta1' => $request["respuesta1"],
            'pregunta2' => $request["pregunta2"],
            'respuesta2' => $request["respuesta2"],
            'pregunta3' => $request["pregunta3"],
            'respuesta3' => $request["respuesta3"],
            'pregunta4' => $request["pregunta4"],
            'respuesta4' => $request["respuesta4"],
        ];

        $existLanding = Landing::where('project_id', $id)->first();
        // Subir imagenes
        $rutaLogo = '';
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('logo-subir')) {
            if (isset($existLanding)) {
                $encabezadoLogo = json_decode($existLanding->encabezado, true);
                // Obtener la ruta de la imagen
                $rutaLogoM = public_path($encabezadoLogo["logo_subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (isset($encabezadoLogo["logo_subir"]) && file_exists($rutaLogoM)) {
                    unlink($rutaLogoM); // Eliminar el archivo
                }
            }
            $rutaLogo = $request->file('logo-subir')->store('logos', 'public'); // Almacena en storage/app/public/imagenes
        }

        $encabezadoLogo = isset($existLanding) && json_decode($existLanding->encabezado, true);
        $encabezado["logo_subir"] = isset($existLanding) && isset($encabezadoLogo) && !empty($encabezadoLogo["logo_subir"]) && !$request->hasFile('logo-subir') ? $encabezadoLogo["logo_subir"] : $rutaLogo;

        /// banner_subir
        $rutaBanner = '';
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('banner-subir')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                $encabezadoBanner = json_decode($existLanding->pagina_principal, true);
                // Obtener la ruta de la imagen
                $rutaBannerM = public_path($encabezadoBanner["banner_subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($encabezadoBanner["banner_subir"]) && file_exists($rutaBannerM)) {
                    unlink($rutaBannerM); // Eliminar el archivo
                }
            }

            $rutaBanner = $request->file('banner-subir')->store('banner', 'public'); // Almacena en storage/app/public/imagenes
        }
        $principalBanner= isset($existLanding) &&  json_decode($existLanding->pagina_principal, true);
        $pagina_principal["banner_subir"] = isset($existLanding) && isset($principalBanner) && !empty($principalBanner["banner_subir"] ) && !$request->hasFile('banner-subir') ? $principalBanner["banner_subir"] : $rutaBanner;

        /// imagen-subir
        $rutaImagen = '';
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('imagen-subir')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                $encabezadoImagen = json_decode($existLanding->pagina_principal, true);
                // Obtener la ruta de la imagen
                $rutaImagenM = public_path($encabezadoImagen["imagen-subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($encabezadoImagen["imagen-subir"]) && file_exists($rutaImagenM)) {
                    unlink($rutaImagenM); // Eliminar el archivo
                }
            }

            $rutaImagen = $request->file('imagen-subir')->store('imagen_principal', 'public'); // Almacena en storage/app/public/imagenes
        }

        $principalImagen= isset($existLanding) &&  json_decode($existLanding->pagina_principal, true);
        $pagina_principal["imagen-subir"] = isset($existLanding) && isset($principalImagen) && !empty($principalImagen["imagen-subir"]) && !$request->hasFile('imagen-subir') ? $principalImagen["imagen-subir"] : $rutaImagen;

        /// participar_1
        $rutaParticipar1 = '';
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('participar_1')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                $participar1Img = json_decode($existLanding->como_participar, true);
                // Obtener la ruta de la imagen
                $rutaParticipar1M = public_path($participar1Img["participar_1"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($participar1Img["participar_1"]) && file_exists($rutaParticipar1M)) {
                    unlink($rutaParticipar1M); // Eliminar el archivo
                }
            }

            $rutaParticipar1 = $request->file('participar_1')->store('participar', 'public'); // Almacena en storage/app/public/imagenes
        }
        $participarImagen= isset($existLanding) && json_decode($existLanding->como_participar, true);

        $como_participar["participar_1"] = isset($existLanding) && isset($participarImagen) && !empty($participarImagen["participar_1"]) && !$request->hasFile('participar_1') ? $participarImagen["participar_1"] : $rutaParticipar1;

        /// participar_2
        $rutaParticipar2 = '';
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('participar_2')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                $participar2Img = json_decode($existLanding->como_participar, true);
                // Obtener la ruta de la imagen
                $rutaParticipar2M = public_path($participar2Img["participar_2"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($participar2Img["participar_2"]) && file_exists($rutaParticipar2M)) {
                    unlink($rutaParticipar2M); // Eliminar el archivo
                }
            }

            $rutaParticipar2 = $request->file('participar_2')->store('participar', 'public'); // Almacena en storage/app/public/imagenes
        }

        $como_participar["participar_2"] = isset($existLanding) && isset($participarImagen) && !empty($participarImagen["participar_2"]) && !$request->hasFile('participar_2')  ? $participarImagen["participar_2"] : $rutaParticipar2;

        /// participar_3
        $rutaParticipar3 = '';
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('participar_3')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                $participar3Img = json_decode($existLanding->como_participar, true);
                // Obtener la ruta de la imagen
                $rutaParticipar3M = public_path($participar3Img["participar_3"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($participar3Img["participar_3"]) && file_exists($rutaParticipar3M)) {
                    unlink($rutaParticipar3M); // Eliminar el archivo
                }
            }

            $rutaParticipar3 = $request->file('participar_3')->store('participar', 'public'); // Almacena en storage/app/public/imagenes
        }

        $como_participar["participar_3"] = isset($existLanding) && isset($participarImagen) && !empty($participarImagen["participar_3"]) && !$request->hasFile('participar_3')  ? $participarImagen["participar_3"] : $rutaParticipar3;

        if (!isset($existLanding)) {
            $landing = new Landing();
            $landing->project_id = $id;
            $landing->encabezado = json_encode($encabezado, true);
            $landing->pagina_principal = json_encode($pagina_principal, true);
            $landing->como_participar = json_encode($como_participar, true);
            $landing->formulario_participar = json_encode($formulario, true);
            $landing->ganadores = json_encode($ganador, true);
            $landing->preguntas_frecuentes = json_encode($pregunta, true);
            $landing->redes_sociales = '';
            $landing->html_preview = '';
            $landing->html_origin = '';
            $landing->html_end = '';
            $landing->save();
        } else {
            $landing = Landing::findOrFail($existLanding->id);
            $existLanding->update([
                'encabezado' => json_encode($encabezado, true),
                'pagina_principal' => json_encode($pagina_principal, true),
                'como_participar' => json_encode($como_participar, true),
                'formulario_participar' => json_encode($formulario, true),
                'ganadores' => json_encode($ganador, true),
                'preguntas_frecuentes' => json_encode($pregunta, true),
                'redes_sociales' => '',
                'html_preview' => '',
                'html_origin' => '',
                'html_end' => '',
            ]);
        }

        return response()->json([
            'encabezado' => $encabezado,
            'pagina_principal' => $pagina_principal,
            'como_participar' => $como_participar,
            'formulario' => $formulario,
            'ganador' => $ganador,
            'pregunta' => $pregunta,
            'landing' => $existLanding
        ]);
    }

    public function storeHtml(Request $request, $id) {
        
        $existLanding = Landing::where('project_id', $id)->first();

        if (!isset($existLanding)) {
            return response()->json(['message' => 'Landing no encontrada.'], 404);
        }

        $existLanding->update([
            'html_preview' => $request->html,
            'html_origin' => $request->html,
            'html_end' => $request->html,
        ]);
        
        return response()->json(['message' => 'Landing guardada.'], 201);
    }
}
