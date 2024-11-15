<?php

namespace App\Http\Livewire;

use App\Exports\GanadoresNewExport;
use App\Imports\GanadoresNewImport;
use App\Models\AwardProject;
use App\Models\Participant;
use App\Models\Project;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class GanadoresTable extends Component
{
    use WithPagination;
    use WithFileUploads; // Asegúrate de que este trait esté incluido

    public $search = '';

    public $sortColumnName = "participants.id";

    public $sortDirection = "desc";

    public $projectId;

    public $premiosList;

    // Filtro formulario
    public $fecha_ini = '', $fecha_fin = '', $premios_filtro = '';
 
    // Filtro consulta
    public $fechaIni = '', $fechaFin = '', $premio = '';

    public $name_premio = "", $ganadores, $premios;

    public $id_ganador, $id_premio, $tipo_pro;

    protected $rules = [
        'id_ganador' => 'required',
        'id_premio' => 'required'
    ];
    public $file;
 
    public function mount($projectId) 
    {
        $this->projectId = $projectId;
        $this->tipo_pro = Project::where('id',$this->projectId)->first();
        $this->premiosList = AwardProject::where('project_id', $projectId)->get();
        $this->ganadores = Participant::where('project_id', $projectId)->where("ganador", 0)->get();
    }
 
    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $participant = Participant::searchGanador($this->search)
            ->where('participants.project_id', $this->projectId)
            ->with(['user', 'other_participant'])
            ->leftjoin('users', 'users.id', '=', 'participants.user_id')
            ->leftjoin('other_participants', 'other_participants.id', '=', 'participants.other_participant_id')
            ->select('participants.*', 'users.name', 'users.telefono', 'users.email', 'users.documento', 'other_participants.nombres', 'other_participants.correo', 'other_participants.nro_documento', 'other_participants.telefono as telefonoOther');
        
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

    public function resetForm() {
        $this->id_ganador = '';
        $this->id_premio = '';
    }

    public function store() {

        $this->validate();
        
        $participant = Participant::where('id', $this->id_ganador)->first();

        if (isset($participant) && !empty($participant)) {
            $participant->update([
                'ganador' => 1,
                'award_project_id' => $this->id_premio,
                "fecha_premio" => Carbon::now()
            ]);
        }

        // resetear
        $this->resetForm();

        $this->dispatchBrowserEvent('swal:alert', [
            'title' => 'Registro exitoso!',
            'icon' => 'success',
        ]);
    }

    public function downloadExcel()
    {
        return Excel::download(new GanadoresNewExport, 'formato_nuevo_ganador.xlsx');
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        try {
            // Pasa el ID al importador
            Excel::import(new GanadoresNewImport($this->projectId), $this->file->getRealPath());

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

    public function eliminar($id) {
        $participant = Participant::where('id', $id)->first();

        try {

            $participant->update([
                'ganador' => 0,
                'award_project_id' => null,
                "fecha_premio" => null
            ]);

            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Exitoso!',
                'icon' => 'success',
            ]);
    
        } catch (\Exception $e) {
            // Maneja la excepción
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Error inesperado',
                'icon' => 'error',
            ]);
        }

    }
}
