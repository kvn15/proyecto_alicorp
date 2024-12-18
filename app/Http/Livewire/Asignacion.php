<?php

namespace App\Http\Livewire;

use App\Exports\AsignacionProjectsFormatoExport;
use App\Imports\AsignacionProjectsImport;
use App\Models\AsignacionProject;
use App\Models\AwardProject;
use App\Models\PremioPdv;
use App\Models\SalesPoint;
use App\Models\Xplorer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Asignacion extends Component
{
    use WithPagination;
    use WithFileUploads; // Asegúrate de que este trait esté incluido

    public $search = '';

    public $sortColumnName = "asignacion_projects.id";

    public $sortDirection = "desc";

    public $projectId;

    // listas
    public $premios, $sales_point, $xplorers;

    // Agregar
    public $idAsignacion, $fecha_ini, $fecha_fin, $punto_venta, $xplorer, $premio, $qty_premio;

    public $file;

    public $lPremios = [];

    public $textBtnAdd = "Agregar";

    protected $rules = [
        'fecha_ini' => 'required',
        'fecha_fin' => 'required',
        'punto_venta' => 'required',
        'xplorer' => 'required',
    ];
    
    public function render()
    {
        $asignacion = AsignacionProject::search($this->search)
            ->where('asignacion_projects.project_id', $this->projectId)
            ->with('xplorer')
            ->join('xplorers', 'xplorers.id', '=', 'asignacion_projects.xplorer_id')
            ->leftJoin('award_projects', 'award_projects.id', '=', 'asignacion_projects.award_project_id')
            ->join('sales_points', 'sales_points.id', '=', 'asignacion_projects.sales_point_id')
            ->select('asignacion_projects.*', 'xplorers.name', 'xplorers.email', 'sales_points.name', 'award_projects.nombre_premio')
            ->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);

        return view('livewire.asignacion', compact('asignacion'));
    }
 
    public function mount($projectId) 
    {
        $this->projectId = $projectId;
        $this->premios = AwardProject::where("project_id", $projectId)->get();
        $this->sales_point = SalesPoint::where('status', 1)->get();
        $this->xplorers = Xplorer::all();
    }

    public function allDatas() {
        $this->premios = AwardProject::where("project_id", $this->projectId)->get();
        $this->sales_point = SalesPoint::where('status', 1)->get();
        $this->xplorers = Xplorer::all();
    }
 
    public function search()
    {
        $this->resetPage();
    }

    public function store() {

        $this->validate();

        try {
    
            if (count($this->lPremios) == 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Debe asignar por lo menos un premio.',
                    'icon' => 'error',
                ]);
                return;
            }
            
            $asignacion = AsignacionProject::create([
                'project_id' => $this->projectId,
                'xplorer_id' => $this->xplorer,
                'fecha_inicio' => $this->fecha_ini,
                'fecha_fin' => $this->fecha_fin,
                'sales_point_id' => $this->punto_venta,
                'award_project_id' => null,
                'qty_premio' => null,
            ]);
    
            // Agregar premios
            foreach ($this->lPremios as $key => $value) {
                PremioPdv::create([
                    'asignacion_project_id' => $asignacion->id,
                    'award_project_id' => $value["premioId"],
                    'qty_premio' => $value["cantidad"]
                ]);
            }
    
            // resetear
            $this->resetForm();
    
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Registro exitoso!',
                'icon' => 'success',
            ]);
        } catch (\Exception $e) {
            // Maneja la excepción
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }

    public function sortBy($columnName) 
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection() 
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public $selected = [];
    
    public function updatedSelected($value, $key)
    {
        // Lógica que deseas ejecutar cuando cambie el estado de los checkboxes
        if ($value) {
            $asignacion = AsignacionProject::where('id', $key)->first();
            $this->idAsignacion = $asignacion->id;
            $this->xplorer = $asignacion->xplorer_id;
            $this->fecha_ini = $asignacion->fecha_inicio;
            $this->fecha_fin = $asignacion->fecha_fin;
            $this->punto_venta = $asignacion->sales_point_id;
            $this->premio = $asignacion->award_project_id;
            $this->qty_premio = $asignacion->qty_premio;
            $premios = PremioPdv::where('asignacion_project_id', $asignacion->id)->get();
            foreach ($premios as $key => $value) {
                $premioKick = AwardProject::where("id", $value->award_project_id)->first();
                $premioObj = [
                    "id" => $value->id,
                    "premioId" => $value->award_project_id,
                    "premioName" => $premioKick->nombre_premio,
                    "cantidad" => $value->qty_premio
                ];
                $this->lPremios = array_merge($this->lPremios, [$premioObj]);
            }
        } else {
            // resetear
            $this->resetForm();
        }
    }

    public function resetForm() {
        $this->idAsignacion = '';
        $this->xplorer = '';
        $this->fecha_ini = '';
        $this->fecha_fin = '';
        $this->punto_venta = '';
        $this->premio = '';
        $this->qty_premio = '';
        $this->lPremios = [];
    }

    public function update() {

        $this->validate();

        $asignacion = AsignacionProject::findOrFail($this->idAsignacion);

        if (!$asignacion) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'No se encontro Asignación',
                'icon' => 'error',
            ]);
            return;
        }
        
        $asignacion->update([
            'xplorer_id' => $this->xplorer,
            'fecha_inicio' => $this->fecha_ini,
            'fecha_fin' => $this->fecha_fin,
            'sales_point_id' => $this->punto_venta,
            'award_project_id' => null,
            'qty_premio' => null,
        ]);

        $premios = PremioPdv::where('asignacion_project_id', $asignacion->id)->get();

        foreach ($premios as $key => $value) {
            $asignacionPdv = PremioPdv::where('id', $value->id)->first();
            $premioIds = array_column($this->lPremios, 'id');
            
            if (in_array($value->id, $premioIds)) {
                $preimioAssig = collect($this->lPremios);
                $resultado = $preimioAssig->where('id', $value->id)->first();
                
                $asignacionPdv->update([
                    'award_project_id' => $resultado["premioId"],
                    'qty_premio' => $resultado["cantidad"]
                ]);

            } else {
                if ($asignacionPdv) {
                    $asignacionPdv->delete();
                }
            }
        }

        $preimioAssig = collect($this->lPremios);
        $resultado = $preimioAssig->where('id', 0)->all();

        // Agregar premios
        foreach ($resultado as $key => $value) {
            PremioPdv::create([
                'asignacion_project_id' => $asignacion->id,
                'award_project_id' => $value["premioId"],
                'qty_premio' => $value["cantidad"]
            ]);
        }
        

        $this->dispatchBrowserEvent('swal:alert', [
            'title' => 'Actualización exitoso!',
            'icon' => 'success',
        ]);
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        try {
            // Pasa el ID al importador
            Excel::import(new AsignacionProjectsImport($this->projectId), $this->file->getRealPath());

            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Carga exitosa!',
                'icon' => 'success',
            ]);
        } catch (\Exception $e) {
            // Maneja la excepción
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }
    public function downloadExcel()
    {
        return Excel::download(new AsignacionProjectsFormatoExport, 'formato_asignacion.xlsx');
    }

    public function addTablePremio() {
        $idPremio = $this->premio;
        $premioKick = AwardProject::where("project_id", $this->projectId)->where('id', $idPremio)->first();
    
        if ($premioKick) {

            if ($this->textBtnAdd == "Editar") {
                // $resultado = $preimioAssig->where('premioId', $idPremio)->first();
                foreach ($this->lPremios as &$item) {
                    if ($item['premioId'] == $idPremio) {
                        $item['cantidad'] = $this->qty_premio;  // Cambiar el nombre
                    }
                }
                $this->cancelar();
            } else {
            
                $premioObj = [
                    "id" => 0,
                    "premioId" => $idPremio,
                    "premioName" => $premioKick->nombre_premio,
                    "cantidad" => $this->qty_premio
                ];
        
                $premioIds = array_column($this->lPremios, 'premioId');
    
                if (in_array($idPremio, $premioIds)) {
                    // El premio ya existe, no lo agregues
                    $this->dispatchBrowserEvent('swal:alert', [
                        'title' => "El premio ya se encuentra agregado.",
                        'icon' => 'error',
                    ]);
                } else {
                    // Usa array_merge para actualizar el array de manera que Livewire lo reconozca
                    $this->lPremios = array_merge($this->lPremios, [$premioObj]);
    
                    $this->premio = null;
                    $this->qty_premio = null;
                }
            }
        } else {
            // Si no se encuentra el premio
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => "Premio no encontrado.",
                'icon' => 'error',
            ]);
        }
    }

    public function deletePremio($premioId) {
        
        // Filtrar el array para eliminar el elemento con el premioId
        $this->lPremios = array_filter($this->lPremios, function($premio) use ($premioId) {
            return $premio['premioId'] != $premioId;
        });
    
        // Reindexar el array después de eliminar el elemento (opcional)
        $this->lPremios = array_values($this->lPremios);
    }
    
    public function getListaById($premioId) {
        $preimioAssig = collect($this->lPremios);
        $resultado = $preimioAssig->where('premioId', $premioId)->first();
        $this->premio = $resultado["premioId"];
        $this->qty_premio = $resultado["cantidad"];
        $this->textBtnAdd = "Editar";
    }

    public function cancelar()  {
        $this->premio = null;
        $this->qty_premio = null;
        $this->textBtnAdd = "Agregar";
    }
}
