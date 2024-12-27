<?php

namespace App\Http\Controllers\Admin\landing_promocional;

use App\Http\Controllers\Controller;
use App\Models\AwardProject;
use App\Models\GameView;
use App\Models\KeepTrying;
use App\Models\Landing;
use App\Models\Marca;
use App\Models\Participant;
use App\Models\Project;
use App\Models\RaspaGana;
use App\Models\Roulette;
use App\Models\ViewProject;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPromocionalController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function show($id)
    {
        $landing = Project::where('id', $id)
                            ->first();
        $NroVistas = ViewProject::where('project_id', $id)->count();
        $NroParticipantes = Participant::where('project_id', $id)->count();
        $NroGanadores = Participant::where('project_id', $id)->where('ganador', 1)->count();

        // Obtener ultimos ganadores
        $ultParticipantes = Participant::where('project_id', $id)->orderBy('created_at', 'desc')->limit(8)->get();
        $ultGanadores = Participant::where('project_id', $id)->where('ganador', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        
        // Obtener los meses
        $startDate = Carbon::parse($landing->fecha_ini_proyecto);
        $endDate = Carbon::now()->endOfYear(); // O puedes usar otra fecha como '2024-12-31'
        $meses = [];

        // while ($startDate->lte($endDate)) {
        //     $monthName = $startDate->translatedFormat('F'); // Nombre del mes en español
        //     if (!in_array($monthName, $meses)) {
        //         $meses[] = $monthName;
        //     }
        //     $startDate->addMonth(); // Sumar un mes
        // }
        // $meses = array_map('ucfirst', $meses);
        
        $meses = $this->obtenerUltimos12Meses();

        // obtener las vistas x mes
        $vistas = $this->arrayVistas($id);

        // Obtener participantes por mes
        $partcipantes = $this->arrayParticipante($id);

        $project = [
            'landing' => $landing,
            'NroVistas' => $NroVistas,
            'NroParticipantes' => $NroParticipantes,
            'NroGanadores' => $NroGanadores,
            'meses' => implode('|',$meses),
            'vistas' => implode('|',$vistas),
            'participantes' => implode('|',$partcipantes),
            'ultParticipantes' => $ultParticipantes,
            'ultGanadores' => $ultGanadores
        ];
        return view('admin.pages.landing_promocional.show', compact('project'));
    }

    public function publicar(Request $request, $id) {

        $project = Project::findOrFail($id);

        $project->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Se actualizo el estado del proyecto.'
        ]);
    }

    public function indicador($id)
    {
        $landing = Project::where('id', $id)->first();
        // Obtener los meses
        $startDate = Carbon::parse($landing->fecha_ini_proyecto);
        $endDate = Carbon::now()->endOfYear(); // O puedes usar otra fecha como '2024-12-31'
        $meses = [];
 
        // while ($startDate->lte($endDate)) {
        //     $monthName = $startDate->translatedFormat('F'); // Nombre del mes en español
        //     if (!in_array($monthName, $meses)) {
        //         $meses[] = $monthName;
        //     }
        //     $startDate->addMonth(); // Sumar un mes
        //  }
        // $meses = array_map('ucfirst', $meses);
        $meses = $this->obtenerUltimos12Meses();

        // obtener las vistas x mes
        $vistas = $this->arrayVistas($id);

        // Obtener participantes por mes
        $partcipantes = $this->arrayParticipante($id);

        $NroVistas = ViewProject::where('project_id', $id)->count();
        $NroParticipantes = Participant::where('project_id', $id)->count();
        $NroGanadores = Participant::where('project_id', $id)->where('ganador', 1)->count();

        // Dias promocíon
        $fechaInicio = Carbon::parse($landing->fecha_ini_proyecto); // Desde un formulario
        $fechaActual = Carbon::now();
        $diasPromocion = $fechaInicio->diffInDays($fechaActual);

        // ultimos 7 dias
        $ultimos7Dias = $this->VistasUltimos7Dias($id);

        $total7Dias = $this->TotalVistasUltimos7Dias($id);

        $project = [
            'landing' => $landing,
            'NroVistas' => $NroVistas,
            'NroParticipantes' => $NroParticipantes,
            'NroGanadores' => $NroGanadores,
            'diasPromocion' => $diasPromocion,
            'meses' => implode('|',$meses),
            'vistas' => implode('|',$vistas),
            'participantes' => implode('|',$partcipantes),
            'ultimos7Dias' => $ultimos7Dias,
            'total7Dias' => $total7Dias,
        ];

        return view('admin.pages.landing_promocional.indicadores', compact('project'));
    }

    public function participante($id)
    {
        $landing = Project::where('id', $id)
                            ->first();
        return view('admin.pages.landing_promocional.participantes', compact('landing'));
    }
    
    public function ganador($id)
    {
        $landing = Project::where('id', $id)
                            ->first();
        return view('admin.pages.landing_promocional.ganadores', compact('landing'));
    }
    
    public function asignacion($id)
    {
        $landing = Project::where('id', $id)
                            ->first();
        return view('admin.pages.landing_promocional.asingnacion', compact('landing'));
    }

    public function configuracion($id)
    {
        $project = Project::where('id', $id)
                            ->first();
        if($project){
            $project->fecha_ini_proyecto = Carbon::parse($project->fecha_ini_proyecto)->format('Y-m-d');
            $project->fecha_fin_proyecto = $project->fecha_fin_proyecto ? Carbon::parse($project->fecha_fin_proyecto)->format('Y-m-d') : null;
            $project->fecha_ini_participar = $project->fecha_ini_participar ? Carbon::parse($project->fecha_ini_participar)->format('Y-m-d') : null;
            $project->fecha_fin_participar = $project->fecha_fin_participar ? Carbon::parse($project->fecha_fin_participar)->format('Y-m-d') : null;
        }

        $lmarcas = Marca::where("status", 1)->get();

        $data = [
            "project" => $project,
            "marcas" => $lmarcas
        ];

        return view('admin.pages.landing_promocional.configuracion', compact('data'));
    }

    // metodos
    public function arrayVistas($id) {
        $meses = [];
        $fechaActual = Carbon::now();

        for ($i = 0; $i < 12; $i++) {
            $meses[$fechaActual->format('Y-m')] = [
                'mes' => ucfirst($fechaActual->locale('es')->isoFormat('MMMM')), // Nombre del mes
                'count' => 0, // Valor predeterminado
            ];
            $fechaActual->subMonth();
        }

        $vistasPorMes = ViewProject::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
                    ->where('project_id', $id)
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
                    
        // Reemplazar los valores en el array base si existen datos
        foreach ($vistasPorMes as $vista) {
            if (isset($meses[$vista->month])) {
                $meses[$vista->month]['count'] = $vista->count;
            }
        }

        // Convertir a array final
        $resultado = array_values($meses);

        $retornoValor = [];

        foreach ($resultado as $key => $value) {
            array_unshift($retornoValor, $value["count"]);
        }

        // Retornar o procesar el resultado
        return $retornoValor;
    }

    public function arrayParticipante($id) {
        $meses = [];
        $fechaActual = Carbon::now();

        for ($i = 0; $i < 12; $i++) {
            $meses[$fechaActual->format('Y-m')] = [
                'mes' => ucfirst($fechaActual->locale('es')->isoFormat('MMMM')), // Nombre del mes
                'count' => 0, // Valor predeterminado
            ];
            $fechaActual->subMonth();
        }

        $participantePorMes = Participant::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
                    ->where('project_id', $id)
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
        
        // Reemplazar los valores en el array base si existen datos
        foreach ($participantePorMes as $participante) {
            if (isset($meses[$participante->month])) {
                $meses[$participante->month]['count'] = $participante->count;
            }
        }

        // Convertir a array final
        $resultado = array_values($meses);

        $retornoValor = [];

        foreach ($resultado as $key => $value) {
            array_unshift($retornoValor, $value["count"]);
        }

        // Retornar o procesar el resultado
        return $retornoValor;
    }

    public function VistasUltimos7Dias($id)  {
        // Obtener la fecha actual y la fecha de hace 7 días
        $fechaInicio = Carbon::now()->subDays(6); // 6 días atrás (incluyendo hoy)
        $fechaFin = Carbon::now(); // Hoy

        // Agrupar las vistas por día y contar
        $vistasUltimos7Dias = ViewProject::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('project_id', $id)
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Inicializar el array de resultados con 7 días
        $resultado = array_fill(0, 7, 0);

        // Llenar el array con los conteos por día
        foreach ($vistasUltimos7Dias as $vista) {
            $index = Carbon::parse($vista->date)->diffInDays($fechaFin); // Calcular el índice basado en la fecha
            $resultado[6 - $index] = $vista->count; // Guardar el conteo en la posición correspondiente
        }

        return $resultado;
    }

    public function TotalVistasUltimos7Dias($id)  {
        // Obtener la fecha actual y la fecha de hace 7 días
        $fechaInicio = Carbon::now()->subDays(6); // 6 días atrás (incluyendo hoy)
        $fechaFin = Carbon::now(); // Hoy

        // Agrupar las vistas por día y contar
        $totalUltimos7Dias = ViewProject::where('project_id', $id)
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->count();
            
        return $totalUltimos7Dias;
    }

    public function personalizarLanding($id) {
        
        $project = Project::where('id', $id)
                            ->first();

        $landing = Landing::where('project_id', $id)->first();
        $data = [
            'project' => $project,
            'landing' => $landing
        ];
        return view('admin.pages.landing_promocional.personalizarLanding', compact('data'));
    }

    public function personalizarJuego($id) {
        
        $project = Project::where('id', $id)
                            ->first();
        $gameMemoria = GameView::where('project_id', $id)->first();
        $projectPremio = AwardProject::where('project_id', $id)->get();
        $premio = $this->obtenerPremio($id);
        $sigueIntentando = KeepTrying::where('project_id', $id)->first();

        $data = [
            'project' => $project,
            'gameMemoria' => $gameMemoria,
            'projectPremio' => $projectPremio,
            'premio' => $premio,
            'sigueIntentando' => $sigueIntentando
        ];

        return view('admin.pages.landing_promocional.personalizarMemoria', compact('data'));
    }

    public function personalizarJuegoRaspaGana($id) {
        
        $project = Project::where('id', $id)
                            ->first();
        $gameRaspaGana = RaspaGana::where('project_id', $id)->first();
        $projectPremio = AwardProject::where('project_id', $id)->get();
        $premio = $this->obtenerPremio($id);
        $sigueIntentando = KeepTrying::where('project_id', $id)->first();

        $data = [
            'project' => $project,
            'gameRaspaGana' => $gameRaspaGana,
            'projectPremio' => $projectPremio,
            'premio' => $premio,
            'sigueIntentando' => $sigueIntentando
        ];

        return view('admin.pages.landing_promocional.personalizarRaspaGana', compact('data'));
    }

    public function personalizarRuleta($id) {
        
        $project = Project::where('id', $id)
                            ->first();
        $gameRuleta = Roulette::where('project_id', $id)->first();
        $projectPremio = AwardProject::where('project_id', $id)->get();
        $premioRuleta = DB::table('award_projects')->where('project_id', $id)->select('id', 'nombre_premio as name', DB::raw("CONCAT('/storage/', imagen) AS img"))->get();
        $premio = $this->obtenerPremio($id);
        $sigueIntentando = KeepTrying::where('project_id', $id)->first();

        $data = [
            'project' => $project,
            'gameRuleta' => $gameRuleta,
            'projectPremio' => $projectPremio,
            'premio' => $premio,
            'premioRuleta' => $premioRuleta,
            'sigueIntentando' => $sigueIntentando
        ];

        return view('admin.pages.landing_promocional.personalizarRuleta', compact('data'));
    }

    public function obtenerPremio($projectId) {
        // Obtener todos los premios con su probabilidad
        $premios = AwardProject::where('project_id', $projectId)->where('stock','>',0)->get();
        $project = Project::findOrFail($projectId);
        $sigueIntentando = KeepTrying::where('project_id', $projectId)->first();
    
        // Crear un array acumulativo para la probabilidad
        $acumulado = [];
        $total = 0;

        $rutaSigue = '';
        if (isset($sigueIntentando) && !empty($sigueIntentando)) {
            $rutaSigue = $sigueIntentando["imagen"];
        }
    
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
            'imagen' => $rutaSigue,
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

    public function obtenerUltimos12Meses()
    {
        $ultimosMeses = [];
        $fechaActual = Carbon::now(); // Fecha actual usando Carbon

        for ($i = 0; $i < 12; $i++) {
            $mes = $fechaActual->locale('es')->isoFormat('MMMM'); // Nombre del mes en español
            array_unshift($ultimosMeses, ucfirst($mes)); // Capitalizar la primera letra
            $fechaActual->subMonth(); // Restar un mes
        }

        return $ultimosMeses;
    }
}
