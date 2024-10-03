<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Project;
use Livewire\Component;

class ModalProject extends Component
{

    public $tipo_promocion = '1', $game, $nombre_promocion, $desc_promocion, $marcas, $game_select, $gameText;
    public $tipoProyecto;
    public $idProyecto, $nombreProyectoCreado;

    public function submit() {
        
        $proyecto = new Project();
        $proyecto->project_type_id = $this->tipo_promocion;
        $proyecto->nombre_promocion = $this->nombre_promocion;
        $proyecto->desc_promocion = $this->desc_promocion;
        $proyecto->marcas = $this->marcas;
        $proyecto->game_id = $this->game_select;

        $proyecto->save();

        $this->idProyecto = $proyecto->id;
        $this->nombreProyectoCreado = $proyecto->nombre_promocion;

        $proyecto->project_type_id = '';
        $proyecto->nombre_promocion = '';
        $proyecto->desc_promocion = '';
        $proyecto->marcas = '';
        $proyecto->game_id = '';
        
        $this->emit('eventoFinish');
    }

    public function changeProjecto($idProyecto) {
        $this->tipo_promocion = $idProyecto;
        $this->tipoProyecto = $this->tipo_promocion == 1 ? 'Landing Promocional' : ($this->tipo_promocion == 2 ? 'Juego Web' : 'Juego Campaña');
        if ($idProyecto == 1) {
            $this->emit('eventoLanding');
        } else if ($idProyecto == 2) {
            $this->emit('eventoWeb');
        } else {
            $this->emit('eventoCampana');
        }
    }

    public function mount() 
    {
        $this->game = Game::all();
    }

    public function render()
    {
        return view('livewire.modal-project');
    }
}
