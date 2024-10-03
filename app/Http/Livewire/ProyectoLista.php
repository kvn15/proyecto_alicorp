<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProyectoLista extends Component
{

    public $tipoProyecto, $bMisProyectos;

    public $search = '';

    public function mount($tipoProyecto, $bMisProyectos = false) {
        $this->tipoProyecto = $tipoProyecto;
        $this->bMisProyectos =  $bMisProyectos;
    }

    public function render()
    {
        $projects = Project::search($this->search, $this->tipoProyecto)->get();

        return view('livewire.proyecto-lista', compact('projects'));
    }
}
