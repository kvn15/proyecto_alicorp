<?php

namespace App\Http\Livewire;

use App\Models\Game;
use LivewireUI\Modal\ModalComponent;

class CrearProyectoBtn extends ModalComponent
{
    // Variables
    public $game;
    public $tipo_promocion;

    public function mount() 
    {
        $this->game = Game::all();
    }

    public function render()
    {
        return view('livewire.crear-proyecto-btn');
    }

    public function submit() 
    {
        dd($this->tipo_promocion);
    }
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '5xl';
    }
}
