<?php

namespace App\Http\Livewire;

use App\Exports\AsignacionProjectsFormatoExport;
use App\Imports\AsignacionProjectsImport;
use App\Models\AsignacionProject;
use App\Models\AwardProject;
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

    protected $rules = [
        'fecha_ini' => 'required',
        'fecha_fin' => 'required',
        'punto_venta' => 'required',
        'xplorer' => 'required',
        'premio' => 'required',
        'qty_premio' => 'required',
    ];
    
    public function render()
    {
        $asignacion = AsignacionProject::search($this->search)
            ->where('asignacion_projects.project_id', $this->projectId)
            ->with('xplorer')
            ->join('xplorers', 'xplorers.id', '=', 'asignacion_projects.xplorer_id')
            ->join('award_projects', 'award_projects.id', '=', 'asignacion_projects.award_project_id')
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
 
    public function search()
    {
        $this->resetPage();
    }

    public function store() {

        $this->validate();
        
        AsignacionProject::create([
            'project_id' => $this->projectId,
            'xplorer_id' => $this->xplorer,
            'fecha_inicio' => $this->fecha_ini,
            'fecha_fin' => $this->fecha_fin,
            'sales_point_id' => $this->punto_venta,
            'award_project_id' => $this->premio,
            'qty_premio' => $this->qty_premio,
        ]);

        // resetear
        $this->resetForm();

        $this->dispatchBrowserEvent('swal:alert', [
            'title' => 'Registro exitoso!',
            'icon' => 'success',
        ]);
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
            'award_project_id' => $this->premio,
            'qty_premio' => $this->qty_premio,
        ]);

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
}
