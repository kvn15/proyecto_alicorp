<?php

namespace App\Http\Livewire;

use App\Models\SalesPoint;
use Livewire\Component;

class PuntoVenta extends Component
{

    // Variables
    public $lPuntoVenta = [];
    public $puntoVenta = '';
    public $idPuntoVenta = null;

    public function render()
    {
        return view('livewire.punto-venta');
    }

    protected $rules = [
        'puntoVenta' => 'required'
    ];

    public function mount() 
    {
        $this->obtenerPuntoVenta();
    }

    public function resetForm() {
        $this->puntoVenta = '';
        $this->idPuntoVenta = null;
    }

    public function obtenerPuntoVenta() {
        $this->lPuntoVenta = SalesPoint::all();
    }


    public function store() {

        $this->validate();

        try {
            
            if ($this->idPuntoVenta == null) {

                SalesPoint::create([
                    'name' => $this->puntoVenta,
                    'status' => 1
                ]);
    
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Registro exitoso!',
                    'icon' => 'success',
                ]);
            } else {

                $puntoVenta = SalesPoint::where('id', $this->idPuntoVenta)->first();

                if (!isset($puntoVenta) || empty($puntoVenta)) {
                    $this->dispatchBrowserEvent('swal:alert', [
                        'title' => "El punto de venta no se puede editar.",
                        'icon' => 'error',
                    ]);
                    return;
                }

                $puntoVenta->update([
                    'name' => $this->puntoVenta
                ]);
    
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Actualización exitosa!',
                    'icon' => 'success',
                ]);

            }
            
            // resetear
            $this->resetForm();

            $this->obtenerPuntoVenta();

        } catch (\Exception $e) {
            // Maneja la excepción
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }

    public function editar($item) {
        $this->puntoVenta = $item["name"];
        $this->idPuntoVenta = $item["id"];
    }

    public function changeEstado($item) {

        $puntoVenta = SalesPoint::where('id', $item["id"])->first();

        if (!isset($puntoVenta) || empty($puntoVenta)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => "El punto de venta no se puede editar.",
                'icon' => 'error',
            ]);
            return;
        }

        $status = $item["status"] == 1 ? 0 : 1;

        $puntoVenta->update([
            'status' => $status
        ]);

        $this->dispatchBrowserEvent('swal:alert', [
            'title' => 'Actualización exitosa!',
            'icon' => 'success',
        ]);

        $this->obtenerPuntoVenta();
    }

    public function delete($item) {

        $puntoVenta = SalesPoint::where('id', $item["id"])->first();

        if (!isset($puntoVenta) || empty($puntoVenta)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => "El punto de venta no se puede eliminar.",
                'icon' => 'error',
            ]);
            return;
        }

        $puntoVenta->delete();

        $this->dispatchBrowserEvent('swal:alert', [
            'title' => 'Eliminación exitosa!',
            'icon' => 'success',
        ]);

        $this->obtenerPuntoVenta();
    }
}
