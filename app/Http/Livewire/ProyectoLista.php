<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProyectoLista extends Component
{

    public $tipoProyecto, $bMisProyectos;

    public $search = '';

    // Filtros
    public $activo, $inactivo, $finalizado, $usuarioCreo, $fechaDesde, $fechaHasta, $xplorer;

    public $estados = [0, 1, 2 ,3], $idUsuario, $fechaIni, $fechaFin;

    public function mount($tipoProyecto, $bMisProyectos = false, $xplorer = false) {
        $this->tipoProyecto = $tipoProyecto;
        $this->xplorer = $xplorer;
        $this->usuarioCreo =  $bMisProyectos == true ? Auth::user()->id : null;
        $this->idUsuario = $this->usuarioCreo;
    }

    public function filter() {

        if (isset($this->activo) || isset($this->inactivo) || isset($this->finalizado)) {

            $arrayEstados = [];

            if (isset($this->activo) && $this->activo == true) {
                array_push($arrayEstados, 1);
            }
            if (isset($this->inactivo) && $this->inactivo == true) {
                array_push($arrayEstados, 0);
            }
            if (isset($this->finalizado) && $this->finalizado == true) {
                array_push($arrayEstados, 3);
            }

            $this->estados = $arrayEstados;
        } else {
            $this->estados = [0, 1, 2 ,3];
        }

        if (isset($this->usuarioCreo)) {
            $this->idUsuario = $this->usuarioCreo;
        } else {
            $this->idUsuario = null;
        }

        if (isset($this->fechaDesde) && isset($this->fechaHasta)) {
            $this->fechaIni = $this->fechaDesde;
            $this->fechaFin = $this->fechaHasta;
        }

    }

    protected $listeners = ['refreshComponent' => 'render'];

    public function render()
    {
        if ($this->xplorer == false) {
            $projects = Project::search($this->search, $this->tipoProyecto);
    
            if (isset($this->estados)) {
                $projects->whereIn('status', $this->estados);
            }
            
            if (isset($this->idUsuario) && $this->idUsuario != 0) {
                $projects->where('admin_id', $this->idUsuario);
            }
            
            if (isset($this->fechaIni) && !empty($this->fechaFin)) {
                $projects->whereBetween('created_at', [$this->fechaIni, $this->fechaFin]);
            }
    
            $projects = $projects->get();
        } else {
            $projects = Project::search($this->search, $this->tipoProyecto)
            ->join('asignacion_projects', 'asignacion_projects.project_id', '=', 'projects.id')
            ->where('asignacion_projects.user_id', $this->idUsuario);
            
            if (isset($this->estados)) {
                $projects->whereIn('status', $this->estados);
            }
            
            if (isset($this->fechaIni) && !empty($this->fechaFin)) {
                $projects->whereBetween('created_at', [$this->fechaIni, $this->fechaFin]);
            }
    
            $projects = $projects->get();
        }

        return view('livewire.proyecto-lista', compact('projects'));
    }
}
