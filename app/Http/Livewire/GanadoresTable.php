<?php

namespace App\Http\Livewire;

use App\Models\AwardProject;
use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;

class GanadoresTable extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "participants.id";

    public $sortDirection = "desc";

    public $projectId;

    public $premiosList;

    // Filtro formulario
    public $fecha_ini = '', $fecha_fin = '', $premios_filtro = '';
 
    // Filtro consulta
    public $fechaIni = '', $fechaFin = '', $premio = '';

    public $name_premio = "";
 
    public function mount($projectId) 
    {
        $this->projectId = $projectId;
        $this->premiosList = AwardProject::where('project_id', $projectId)->get();
    }
 
    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $participant = Participant::searchGanador($this->search)
            ->where('participants.project_id', $this->projectId)
            ->with('user')
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->join('award_projects', 'award_projects.id', '=', 'participants.award_project_id')
            ->select('participants.*', 'users.name', 'users.telefono', 'users.email', 'users.documento');

        if (!empty($this->fechaIni) && !empty($this->fechaFin)) {
            $participant->whereBetween('participants.created_at', [$this->fechaIni, $this->fechaFin]);
        }

        if (!empty($this->premio)) {
            $participant->where('participants.award_project_id', $this->premio);
            $this->emit('premio', $this->name_premio);
        }

        $participant = $participant->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);

        return view('livewire.ganadores-table', compact('participant'));
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
        if (!empty($this->fecha_ini) && !empty($this->fecha_fin)) {
            $this->fechaIni = $this->fecha_ini;
            $this->fechaFin = $this->fecha_fin;
        }
        if (!empty($this->premios_filtro)) {
            $this->premio = $this->premios_filtro;
            $premio = AwardProject::where('id',$this->premio)->first();
            $this->name_premio = $premio->nombre_premio;
        }
    }

    public function removePremio() {
        $this->premios_filtro = "";
        $this->premio = "";
    }

}
