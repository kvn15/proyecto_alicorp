<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class MenuReg extends Component
{

    public $ruta;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ruta, $id)
    {
        $this->ruta = $ruta;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.menu-reg');
    }
}
