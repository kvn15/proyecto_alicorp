<?php

namespace App\Http\Livewire;

use App\Models\Admin\Asignancion;
use Livewire\Component;
use Livewire\WithPagination;

class AsignacionTable extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "asignancions.id";

    public $sortDirection = "desc";
 
    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $asignacion = Asignancion::search($this->search)
            ->with('user')
            ->join('users', 'users.id', '=', 'asignancions.user_id')
            ->select('asignancions.*', 'users.name', 'users.telefono', 'users.email', 'users.documento')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->simplePaginate(10);
        return view('livewire.asignacion-table', compact('asignacion'));
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
}
