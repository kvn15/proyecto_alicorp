<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;

class PaticipanteTable extends Component
{
    use WithPagination;

    public $search = '';

    public $sortColumnName = "participants.id";

    public $sortDirection = "desc";
 
    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $participant = Participant::search($this->search)
            ->with('user')
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->select('participants.*', 'users.name', 'users.telefono', 'users.email', 'users.documento')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->simplePaginate(10);
        return view('livewire.paticipante-table', compact('participant'));
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
