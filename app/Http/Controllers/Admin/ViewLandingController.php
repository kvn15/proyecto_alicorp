<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Landing;
use App\Models\OtherParticipant;
use App\Models\Participant;
use App\Models\Project;
use App\Models\User;
use App\Models\ViewProject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ViewLandingController extends Controller
{
    public function terminos($hub) {
        $project = Project::where('dominio',$hub)->where('status', 1)->first();
        
        if(!isset($project)){
            return back();
        }

        $fechaActual = Carbon::now('America/Lima')->startOfDay();
        if (isset($project->fecha_fin_proyecto)) {
            if ($fechaActual->toDateTimeString() > $project->fecha_fin_proyecto) {
                return redirect()->route('index')->with('projecto', 'La landing se encuentra finalizada');
            }
        }

        $landing = Landing::where('project_id', $project->id)->first();
        $ganadores = Participant::where('project_id', $project->id)->where('ganador', 1)->get();;

        $landingPage = [
            'project' => $project,
            'landing' => $landing,
            'user' => null,
            'ganadores' => $ganadores
        ];

        return view('admin.pages.landing_public.terminosCondiciones', compact('landingPage'));
    }
    //
    public function index($hub) {
        $project = Project::where('dominio',$hub)->where('status', 1)->first();
        
        if(!isset($project)){
            return back();
        }

        $fechaActual = Carbon::now('America/Lima')->startOfDay();
        if (isset($project->fecha_fin_proyecto)) {
            if ($fechaActual->toDateTimeString() > $project->fecha_fin_proyecto) {
                return redirect()->route('index')->with('projecto', 'La landing se encuentra finalizada');
            }
        }

        $landing = Landing::where('project_id', $project->id)->first();
        $ganadores = Participant::where('project_id', $project->id)->where('ganador', 1)->get();;

        $landingPage = [
            'project' => $project,
            'landing' => $landing,
            'user' => null,
            'ganadores' => $ganadores
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
            'color-boton-header' => $request["color-boton-header"],
            'titulo-boton-header' => $request["titulo-boton-header"]
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
            'tamanoTituloPregunta' => isset($request["tamanoTituloPregunta"]) ? $request["tamanoTituloPregunta"] : '',
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

        $redes_sociales = [
            'input-titulo-redes' => $request["input-titulo-redes"],
            'color-titulo-redes' => $request["color-titulo-input-redes"],
            'bold-titulo-redes' => isset($request['bold-titulo-redes']) ? 1 : 0,
            'italic-titulo-redes' => isset($request['italic-titulo-redes']) ? 1 : 0,
            'tamanoTituloRedes' => $request["tamanoTituloRedes"],
            'color-icon-redes' => $request["color-icon-redes"],
            'redes_sociales' => json_decode($request['redes_sociales'], true)
        ];

        $existLanding = Landing::where('project_id', $id)->first();
        $encabezadoLogo = isset($existLanding->encabezado) ? json_decode($existLanding->encabezado, true) : null;
        // Subir imagenes
        $rutaLogo = '';

        if ($request['logo-subir-url'] == null && isset($existLanding) && isset($encabezadoLogo) && !empty($encabezadoLogo["logo_subir"])) {
            // Obtener la ruta de la imagen
            $rutaLogoM = public_path($encabezadoLogo["logo_subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
            // Eliminar el archivo del sistema
            if (isset($encabezadoLogo["logo_subir"]) && !empty($encabezadoLogo["logo_subir"])  && file_exists($rutaLogoM)) {
                unlink($rutaLogoM); // Eliminar el archivo
            }
            $rutaLogo = "";
        }

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('logo-subir')) {
            if (isset($existLanding)) {
                // Obtener la ruta de la imagen
                $rutaLogoM = public_path($encabezadoLogo["logo_subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (isset($encabezadoLogo["logo_subir"]) && !empty($encabezadoLogo["logo_subir"])  && file_exists($rutaLogoM)) {
                    unlink($rutaLogoM); // Eliminar el archivo
                }
            }
            $rutaLogo = $request->file('logo-subir')->store('logos', 'public'); // Almacena en storage/app/public/imagenes
        }

        // $encabezadoLogo = isset($existLanding) && json_decode($existLanding->encabezado, true);
        $encabezado["logo_subir"] = $request['logo-subir-url'] != null && isset($existLanding) && isset($encabezadoLogo) && !empty($encabezadoLogo["logo_subir"]) && !$request->hasFile('logo-subir') ? $encabezadoLogo["logo_subir"] : $rutaLogo;

        /// banner_subir
        $rutaBanner = '';
        $encabezadoBanner = isset($existLanding->pagina_principal) ? json_decode($existLanding->pagina_principal, true) : null;

        if ($request['banner-subir-url'] == null && isset($existLanding) && isset($encabezadoBanner) && !empty($encabezadoBanner["banner_subir"] ) ) {
            // Obtener la ruta de la imagen
            $rutaBannerM = public_path($encabezadoBanner["banner_subir"]); // Suponiendo que la ruta está almacenada en 'ruta'

            // Eliminar el archivo del sistema
            if (!empty($encabezadoBanner["banner_subir"]) && !empty($encabezadoBanner["banner_subir"]) && file_exists($rutaBannerM)) {
                unlink($rutaBannerM); // Eliminar el archivo
            }
            $rutaBanner = "";
        }
        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('banner-subir')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                // Obtener la ruta de la imagen
                $rutaBannerM = public_path($encabezadoBanner["banner_subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($encabezadoBanner["banner_subir"]) && !empty($encabezadoBanner["banner_subir"]) && file_exists($rutaBannerM)) {
                    unlink($rutaBannerM); // Eliminar el archivo
                }
            }

            $rutaBanner = $request->file('banner-subir')->store('banner', 'public'); // Almacena en storage/app/public/imagenes
        }
        $principalBanner= isset($existLanding) &&  json_decode($existLanding->pagina_principal, true);
        $pagina_principal["banner_subir"] = $request['banner-subir-url'] != null && isset($existLanding) && isset($encabezadoBanner) && !empty($encabezadoBanner["banner_subir"] ) && !$request->hasFile('banner-subir') ? $encabezadoBanner["banner_subir"] : $rutaBanner;
        

        /// imagen-subir
        $rutaImagen = '';
        $encabezadoImagen = isset($existLanding->pagina_principal) ? json_decode($existLanding->pagina_principal, true) : null;
        
        if ($request['imagen-subir-url'] == null && isset($existLanding) && isset($encabezadoImagen) && !empty($encabezadoImagen["imagen-subir"])) {
            // Obtener la ruta de la imagen
            $rutaImagenM = public_path($encabezadoImagen["imagen-subir"]); // Suponiendo que la ruta está almacenada en 'ruta'

            // Eliminar el archivo del sistema
            if (!empty($encabezadoImagen["imagen-subir"]) && !empty($encabezadoImagen["subir"]) && file_exists($rutaImagenM)) {
                unlink($rutaImagenM); // Eliminar el archivo
            }
            $rutaImagen = "";
        }

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('imagen-subir')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                // Obtener la ruta de la imagen
                $rutaImagenM = public_path($encabezadoImagen["imagen-subir"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($encabezadoImagen["imagen-subir"]) && !empty($encabezadoImagen["subir"]) && file_exists($rutaImagenM)) {
                    unlink($rutaImagenM); // Eliminar el archivo
                }
            }

            $rutaImagen = $request->file('imagen-subir')->store('imagen_principal', 'public'); // Almacena en storage/app/public/imagenes
        }

        $principalImagen= isset($existLanding) &&  json_decode($existLanding->pagina_principal, true);
        $pagina_principal["imagen-subir"] = $request['imagen-subir-url'] != null && isset($existLanding) && isset($encabezadoImagen) && !empty($encabezadoImagen["imagen-subir"]) && !$request->hasFile('imagen-subir') ? $encabezadoImagen["imagen-subir"] : $rutaImagen;

        /// participar_1
        $rutaParticipar1 = '';
        $participar1Img = isset($existLanding->como_participar) ? json_decode($existLanding->como_participar, true) : null;
        
        if ($request['participar_1-url'] == null && isset($existLanding) && isset($participar1Img) && !empty($participar1Img["participar_1"])) {
            // Obtener la ruta de la imagen
            $rutaParticipar1M = public_path($participar1Img["participar_1"]); // Suponiendo que la ruta está almacenada en 'ruta'

            // Eliminar el archivo del sistema
            if (!empty($participar1Img["participar_1"]) && file_exists($rutaParticipar1M)) {
                unlink($rutaParticipar1M); // Eliminar el archivo
            }
            $rutaParticipar1 = "";
        }

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('participar_1')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
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

        $como_participar["participar_1"] = $request['participar_1-url'] != null && isset($existLanding) && isset($participar1Img) && !empty($participar1Img["participar_1"]) && !$request->hasFile('participar_1') ? $participar1Img["participar_1"] : $rutaParticipar1;

        /// participar_2
        $rutaParticipar2 = '';
        $participar2Img = isset($existLanding->como_participar) ? json_decode($existLanding->como_participar, true) : null;
        
        if ($request['participar_2-url'] == null && isset($existLanding) && isset($participar2Img) && !empty($participar2Img["participar_2"])) {
            // Obtener la ruta de la imagen
            $rutaParticipar2M = public_path($participar2Img["participar_2"]); // Suponiendo que la ruta está almacenada en 'ruta'

            // Eliminar el archivo del sistema
            if (!empty($participar2Img["participar_2"]) && file_exists($rutaParticipar2M)) {
                unlink($rutaParticipar2M); // Eliminar el archivo
            }
            $rutaParticipar2 = "";
        }

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('participar_2')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                // Obtener la ruta de la imagen
                $rutaParticipar2M = public_path($participar2Img["participar_2"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($participar2Img["participar_2"]) && file_exists($rutaParticipar2M)) {
                    unlink($rutaParticipar2M); // Eliminar el archivo
                }
            }

            $rutaParticipar2 = $request->file('participar_2')->store('participar', 'public'); // Almacena en storage/app/public/imagenes
        }

        $como_participar["participar_2"] = $request['participar_2-url'] != null && isset($existLanding) && isset($participar2Img) && !empty($participar2Img["participar_2"]) && !$request->hasFile('participar_2')  ? $participar2Img["participar_2"] : $rutaParticipar2;

        /// participar_3
        $rutaParticipar3 = '';
        $participar3Img = isset($existLanding->como_participar) ? json_decode($existLanding->como_participar, true) : null; 
        
        if ($request['participar_3-url'] == null && isset($existLanding) && isset($participar3Img) && !empty($participar3Img["participar_3"])) {
            // Obtener la ruta de la imagen
            $rutaParticipar3M = public_path($participar3Img["participar_3"]); // Suponiendo que la ruta está almacenada en 'ruta'

            // Eliminar el archivo del sistema
            if (!empty($participar3Img["participar_3"]) && file_exists($rutaParticipar3M)) {
                unlink($rutaParticipar3M); // Eliminar el archivo
            }
            $rutaParticipar3 = "";
        }

        // Almacenar la imagen en el directorio deseado
        if ($request->hasFile('participar_3')) {
            // // Obtener la ruta de la imagen
            if (isset($existLanding)) {
                // Obtener la ruta de la imagen
                $rutaParticipar3M = public_path($participar3Img["participar_3"]); // Suponiendo que la ruta está almacenada en 'ruta'
    
                // Eliminar el archivo del sistema
                if (!empty($participar3Img["participar_3"]) && file_exists($rutaParticipar3M)) {
                    unlink($rutaParticipar3M); // Eliminar el archivo
                }
            }

            $rutaParticipar3 = $request->file('participar_3')->store('participar', 'public'); // Almacena en storage/app/public/imagenes
        }

        $como_participar["participar_3"] = $request['participar_3-url'] != null && isset($existLanding) && isset($participar3Img) && !empty($participar3Img["participar_3"]) && !$request->hasFile('participar_3')  ? $participar3Img["participar_3"] : $rutaParticipar3;

        // dd($como_participar);
        if (!isset($existLanding)) {
            $landing = new Landing();
            $landing->project_id = $id;
            $landing->encabezado = json_encode($encabezado, true);
            $landing->pagina_principal = json_encode($pagina_principal, true);
            $landing->como_participar = json_encode($como_participar, true);
            $landing->formulario_participar = json_encode($formulario, true);
            $landing->ganadores = json_encode($ganador, true);
            $landing->preguntas_frecuentes = json_encode($pregunta, true);
            $landing->redes_sociales = json_encode($redes_sociales, true);
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
                'redes_sociales' => json_encode($redes_sociales, true),
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

    public function register(Request $request, $id) {

        $project = Project::where('id', $id)->first();

        $fechaActual = Carbon::now('America/Lima')->startOfDay();
        if (isset($project->fecha_fin_participar)) {
            if ($fechaActual->toDateTimeString() > $project->fecha_fin_participar) {
                return redirect()->back()->with('mensajeError', 'La participación para esta landing ha finalizado.');;
            }
        }

        // Almacenar la imagen en el directorio deseado
        $ruta = '';
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('landing', 'public'); // Almacena en storage/app/public/imagenes
        }

        // Verificar si el codigo ya existe
        $isCodigo = Participant::where('project_id', $id)->where('codigo', $request->codigo)->first();

        if (isset($isCodigo)) {
            return redirect()->back()->with('mensajeError', 'El N° de LOTE ya existe.');;
        }

        $other_participant_id = null;

        $userId = isset(Auth::user()->id) ? Auth::user()->id : null;

        if ($userId == null || !isset($userId)) {
            // Si existe el dni
            $otherParticipant = OtherParticipant::where('nro_documento', $request->documento)->first();


            if (isset($otherParticipant)) {

                $otherParticipantTel = OtherParticipant::where('nro_documento', '<>', $request->documento)->where('telefono', $request->telefono)->first();

                if (isset($otherParticipantTel)) {
                    return redirect()->back()->with('mensajeError', 'El numero de telefono ya se encuentra registrado.');;
                }
                
                $otherParticipant->update([
                    'nombres' => $request->name,
                    'apellidos' => $request->apellido,
                    'edad' => $request->edad,
                    'telefono' => $request->telefono,
                    'correo' => $request->email
                ]);

                $other_participant_id = $otherParticipant->id;
            } else {

                $otherParticipantTel = OtherParticipant::where('telefono', $request->telefono)->first();

                if (isset($otherParticipantTel)) {
                    return redirect()->back()->with('mensajeError', 'El numero de telefono ya se encuentra registrado.');;
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

        if (isset(Auth::user()->id)) {

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
        }

        $uuid = Str::uuid()->toString();

        return redirect()->back()->with('mensajeSuccess', 'Registro Exitoso');
    }
}
