<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Marca;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ModalProject extends Component
{

    public $pageActual = '';

    public $tipo_promocion = '1', $game, $nombre_promocion, $desc_promocion, $marcas, $game_select, $gameText;
    public $tipoProyecto;
    public $idProyecto, $nombreProyectoCreado;
    public $lmarcas = [];

    protected $listeners = ['hallChanged' => 'change'];

    public function submit() {
        
        $proyecto = new Project();
        $proyecto->project_type_id = $this->tipo_promocion;
        $proyecto->nombre_promocion = $this->nombre_promocion;
        $proyecto->desc_promocion = $this->desc_promocion;
        $proyecto->marcas = $this->marcas;
        $proyecto->game_id = $this->game_select;
        $proyecto->admin_id  = auth()->id();
        $proyecto->fecha_ini_proyecto = Carbon::now();;

        $proyecto->save();

        $this->idProyecto = $proyecto->id;
        $this->nombreProyectoCreado = $proyecto->nombre_promocion;
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

    public function redirectProyecto() {
        $routeProyecto = '';
        if ($this->tipo_promocion == 1) {
            $routeProyecto = 'landing_promocional.show.configuracion';
        } else if ($this->tipo_promocion == 2) {
            $routeProyecto = 'landing_promocional.show.configuracion';
        } else {
            $routeProyecto = 'landing_promocional.show.configuracion';
        }

        $this->tipo_promocion = '';
        $this->tipoProyecto = '';

        return redirect()->route($routeProyecto, ['id' => $this->idProyecto]);
    }

    public function cerrarModal() {
        return redirect()->route($this->pageActual);
    }

    public function mount($pageActual) 
    {
        $this->pageActual = $pageActual;
        $this->game = Game::all();
        $this->lmarcas = Marca::where("status", 1)->get();
    }

    public function render()
    {
        return view('livewire.modal-project');
    }

    public function change()
    {
        $game = Game::where('id', $this->game_select)->first();
        $this->gameText = $game->name;
    }
}
