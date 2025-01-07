<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Xplorer extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "id";

    public $sortDirection = "desc";

    public $idUser = 0;
    public $name = '';
    public $apellido = '';
    public $tipo_documento = 'DNI';
    public $documento = '';
    public $email = '';
    public $password = '';
    public $telefono = '';
    public $edad = 18;
    public $password_recover = '';

    public function render()
    {
        $xplorer = User::search($this->search)
        ->where('is_xplorer', 1)
        ->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);

        return view('livewire.xplorer', compact('xplorer'));
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
        'apellido' => 'required|string|max:255',
        'tipo_documento' => 'required|string',
        'documento' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'edad' => 'nullable|numeric|min:18',
    ];

    public function resetForm() {
        $this->idUser = 0;
        $this->name = '';
        $this->apellido = '';
        $this->tipo_documento = 'DNI';
        $this->documento = '';
        $this->email = '';
        $this->password = '';
        $this->telefono = '';
        $this->edad = 18;
        $this->password_recover = '';
    }

    public function store() {

        $this->validate(); // Validar los datos

        try {

            $isDocumento = User::where('is_xplorer', 1)->where('documento', $this->documento)->get();

            if (count($isDocumento) > 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El documento de identidad ingresado ya existe entre los Xplorers.',
                    'icon' => 'error',
                ]);
                return;
            }

            $isCorreo = User::where('is_xplorer', 1)->where('email', $this->email)->get();

            if (count($isCorreo) > 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El correo ingresado ya existe entre los Xplorers.',
                    'icon' => 'error',
                ]);
                return;
            }

            $isTelefono = User::where('is_xplorer', 1)->where('telefono', $this->telefono)->get();

            if (count($isTelefono) > 0 && !empty($this->telefono)) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El correo ingresado ya existe entre los Xplorers.',
                    'icon' => 'error',
                ]);
                return;
            }

            User::create([
                'name' => $this->name,
                'apellido' => $this->apellido,
                'tipo_documento' => $this->tipo_documento,
                'documento' => $this->documento,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'telefono' => $this->telefono,
                'edad' => $this->edad,
                'is_xplorer' => 1
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

    public function findUserById($id) {
        $user = User::find($id);

        if (!isset($user)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Xplorer no existe.',
                'icon' => 'error',
            ]);
            return;
        }

        $this->idUser = $user->id;
        $this->name = $user->name;
        $this->apellido = $user->apellido;
        $this->tipo_documento = $user->tipo_documento;
        $this->documento = $user->documento;
        $this->email = $user->email;
        $this->password = '********';
        $this->telefono = $user->telefono;
        $this->edad = $user->edad;
    }

    public function update() {

        $this->validate(); // Validar los datos

        try {

            $isDocumento = User::where('is_xplorer', 1)->where('documento', $this->documento)->where('id','<>',$this->idUser)->get();

            if (count($isDocumento) > 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El documento de identidad ingresado ya existe entre los Xplorers.',
                    'icon' => 'error',
                ]);
                return;
            }

            $isCorreo = User::where('is_xplorer', 1)->where('email', $this->email)->where('id','<>',$this->idUser)->get();

            if (count($isCorreo) > 0) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El correo ingresado ya existe entre los Xplorers.',
                    'icon' => 'error',
                ]);
                return;
            }

            $isTelefono = User::where('is_xplorer', 1)->where('telefono', $this->telefono)->where('id','<>',$this->idUser)->get();

            if (count($isTelefono) > 0 && !empty($this->telefono)) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'El correo ingresado ya existe entre los Xplorers.',
                    'icon' => 'error',
                ]);
                return;
            }

            $user = User::find($this->idUser);

            if (!isset($user)) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Xplorer no existe.',
                    'icon' => 'error',
                ]);
                return;
            }

            $user->update([
                'name' => $this->name,
                'apellido' => $this->apellido,
                'tipo_documento' => $this->tipo_documento,
                'documento' => $this->documento,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'edad' => $this->edad,
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
        $user = User::find($id);

        if (!isset($user)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Xplorer no existe.',
                'icon' => 'error',
            ]);
            return;
        }
        $user->update([
            'status' => $user->status == 1 ? 0 : 1
        ]);
    }

    public function changePasword($id) {
        // resetear
        $this->resetForm();

        $user = User::find($id);

        if (!isset($user)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Xplorer no existe.',
                'icon' => 'error',
            ]);
            return;
        }

        $this->idUser = $user->id;
        $this->name = $user->name;
        $this->apellido = $user->apellido;
    }

    public function updatePasword() {

        try {

            if ($this->password != $this->password_recover) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Las contraseñas son distintas.',
                    'icon' => 'error',
                ]);
                return;
            }

            $user = User::find($this->idUser);

            if (!isset($user)) {
                $this->dispatchBrowserEvent('swal:alert', [
                    'title' => 'Xplorer no existe.',
                    'icon' => 'error',
                ]);
                return;
            }

            $user->update([
                'password' => Hash::make($this->password),
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
}
