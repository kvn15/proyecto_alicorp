<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class PaticipanteTable extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "participants.id";

    public $sortDirection = "desc";

    public $projectId, $tipoProject;

    // Filtro formulario
    public $fecha_ini = '', $fecha_fin = '', $tyc_filtro = '', $codigo_filtro = '';

    // Filtro consulta
    public $fechaIni = '', $fechaFin = '', $tyc = '', $codigo = '';

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $project = Project::where('id', $projectId)->first();
        $this->tipoProject = $project->project_type_id;
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->tipoProject === 3) {

            $participant = Participant::searchParticipante($this->search, $this->projectId)
                ->where('project_id', $this->projectId)
                ->with(['user', 'other_participant'])
                ->leftjoin('users', 'users.id', '=', 'participants.user_id')
                ->leftjoin('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
                ->join('sales_points', 'sales_points.id', '=', 'participants.punto_entrega')
                ->select('participants.*', 'sales_points.name as punto_venta', 'users.name', 'users.telefono', 'users.email', 'users.documento', 'other_participants.nombres', 'other_participants.correo', 'other_participants.nro_documento', 'other_participants.telefono as telefonoOther');

            // if (!empty($this->fechaIni) && !empty($this->fechaFin)) {
            //     $participant->whereBetween('participants.created_at', [$this->fechaIni, $this->fechaFin]);
            // }

            if (!empty($this->fechaIni)) {
                $participant->whereDate('participants.created_at','>=', $this->fechaIni);
            }

            if (!empty($this->fechaFin)) {
                $participant->whereDate('participants.created_at', '<=', $this->fechaFin);
            }

            if (!empty($this->tyc) || $this->tyc == "0") {
                $participant->where('participants.terminos_condiciones', $this->tyc);
                $this->emit('terminosCondiciones');
            }
            if (!empty($this->codigo) || $this->codigo == "0") {
                $participant->where('participants.codigo_valido', $this->codigo);
                $this->emit('codigos');
            }

            $participant = $participant->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);
        } else {

            $participant = Participant::searchParticipante($this->search, $this->projectId)
                ->where('project_id', $this->projectId)
                ->with(['user', 'other_participant'])
                ->leftjoin('users', 'users.id', '=', 'participants.user_id')
                ->leftjoin('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
                ->select('participants.*', 'users.name', 'users.telefono', 'users.email', 'users.documento', 'other_participants.nombres', 'other_participants.correo', 'other_participants.nro_documento', 'other_participants.telefono as telefonoOther');

            // if (!empty($this->fechaIni) && !empty($this->fechaFin)) {
            //     $participant->whereBetween('participants.created_at', [$this->fechaIni, $this->fechaFin]);
            // }

            if (!empty($this->fechaIni)) {
                $participant->whereDate('participants.created_at','>=', $this->fechaIni);
            }

            if (!empty($this->fechaFin)) {
                $participant->whereDate('participants.created_at', '<=', $this->fechaFin);
            }

            if (!empty($this->tyc) || $this->tyc == "0") {
                $participant->where('participants.terminos_condiciones', $this->tyc);
                $this->emit('terminosCondiciones');
            }
            if (!empty($this->codigo) || $this->codigo == "0") {
                $participant->where('participants.codigo_valido', $this->codigo);
                $this->emit('codigos');
            }

            $participant = $participant->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);
        }

        return view('livewire.paticipante-table', compact('participant'));
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
        if (!empty($this->tyc_filtro) || $this->tyc_filtro == "0") {
            $this->tyc = $this->tyc_filtro;
        }
        if (!empty($this->codigo_filtro) || $this->codigo_filtro == "0") {
            $this->codigo = $this->codigo_filtro;
        }
    }

    public function removeCorrecto() {
        $this->codigo_filtro = "";
        $this->codigo = "";
    }

    public function removeTermino() {
        $this->tyc_filtro = "";
        $this->tyc = "";
    }
}
