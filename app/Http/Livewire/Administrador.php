<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Administrador extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "id";

    public $sortDirection = "desc";

    public $idUser = 0;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_recover = '';
    
    public function render()
    {
        $admin = Admin::search($this->search)
        ->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);

        return view('livewire.administrador', compact('admin'));
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

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|max:255',
    ];

    public function resetForm() {
        $this->idUser = 0;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_recover = '';
    }

    public function store() {

        $this->validate(); // Validar los datos

        try {

            $isCorreo = Admin::where('email', $this->email)->get();

            if (count($isCorreo) > 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El correo ingresado ya se encuentra registrado.',
                    'icon' => 'error',
                ]);
                return;
            }

            if ($this->password != $this->password_recover) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Las contraseñas son distintas.',
                    'icon' => 'error',
                ]);
                return;
            }

            Admin::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            
            // resetear
            $this->resetForm();
    
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Registro exitoso!',
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

    public function findAdminById($id) {
        $user = Admin::find($id);

        if (!isset($user)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Administrador no existe.',
                'icon' => 'error',
            ]);
            return;
        }

        $this->idUser = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '********';
    }

    public function update() {

        $this->validate(); // Validar los datos

        try {

            $isCorreo = Admin::where('email', $this->email)->where('id','<>',$this->idUser)->get();

            if (count($isCorreo) > 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El correo ingresado ya se encuentra registrado.',
                    'icon' => 'error',
                ]);
                return;
            }

            $user = Admin::find($this->idUser);

            if (!isset($user)) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Administrador no existe.',
                    'icon' => 'error',
                ]);
                return;
            }

            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
    
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Actualización exitosa!',
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

    public function updateStatus($id) {
        $admin = Admin::find($id);
        
        if (!isset($admin)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Administrador no existe.',
                'icon' => 'error',
            ]);
            return;
        }

        $admin->update([
            'status' => $admin->status == 1 ? 0 : 1
        ]);
    }
}
