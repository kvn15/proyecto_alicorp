<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuario extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "id";

    public $sortDirection = "desc";

    public function render()
    {
        $xplorer = User::search($this->search)
        ->where('is_xplorer','<>', 1)
        ->orderBy($this->sortColumnName, $this->sortDirection)->simplePaginate(10);

        return view('livewire.usuario', compact('xplorer'));
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

    public function updateStatus($id) {
        $user = User::find($id);

        if (!isset($user)) {
            $this->dispatchBrowserEvent('swal:alert', [
                'title' => 'Usuario no existe.',
                'icon' => 'error',
            ]);
            return;
        }
        $user->update([
            'status' => $user->status == 1 ? 0 : 1
        ]);
    }
}
