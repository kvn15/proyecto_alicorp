<?php

namespace App\Http\Livewire;

use App\Models\AsignacionProject;
use App\Models\SalesPoint;
use Livewire\Component;
use Livewire\WithPagination;

class AsignacionTable extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "asignacion_projects.id";

    public $sortDirection = "desc";

    public $projectId, $puntoVentaList;

    public $fecha_ini = '', $fecha_fin = '', $punto_venta = '';
    // Filtro consulta
    public $fechaIni = '', $fechaFin = '', $punto = '';
    public $name_punto;
 
    public function search()
    {
        $this->resetPage();
    }
 
    public function mount($projectId) 
    {
        $this->projectId = $projectId;
        $this->puntoVentaList = SalesPoint::all();
    }

    public function render()
    {
        $asignacion = AsignacionProject::search($this->search)
            ->where('asignacion_projects.project_id', $this->projectId)
            ->with('user')
            ->join('users', 'users.id', '=', 'asignacion_projects.user_id')
            ->leftJoin('award_projects', 'award_projects.id', '=', 'asignacion_projects.award_project_id')
            ->join('sales_points', 'sales_points.id', '=', 'asignacion_projects.sales_point_id')
            ->select('asignacion_projects.*', 'users.name', 'users.email', 'sales_points.name', 'award_projects.nombre_premio');

        if (!empty($this->fechaIni)) {
            $asignacion->whereDate('asignacion_projects.fecha_inicio','>=', $this->fechaIni);
        }

        if (!empty($this->fechaFin)) {
            $asignacion->whereDate('asignacion_projects.fecha_fin', '<=', $this->fechaFin);
        }

        if (!empty($this->punto)) {
            $asignacion->where('asignacion_projects.sales_point_id', $this->punto);
            $this->emit('punto', $this->name_punto);
        }

        $asignacion = $asignacion->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);

        return view('livewire.asignacion-table', compact('asignacion'));
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

    public function filter() {
        if (!empty($this->fecha_ini)) {
            $this->fechaIni = $this->fecha_ini;
        }
        if (!empty($this->fecha_fin)) {
            $this->fechaFin = $this->fecha_fin;
        }
        if (!empty($this->punto_venta)) {
            $this->punto = $this->punto_venta;
            $puntoVenta = SalesPoint::where('id',$this->punto)->first();
            $this->name_punto = $puntoVenta->name;
        }
    }

    public function removePremio() {
        $this->punto_venta = "";
        $this->punto = "";
    }
}
