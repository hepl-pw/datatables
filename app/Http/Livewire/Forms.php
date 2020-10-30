<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Forms extends Component
{
    public $qp;
    public $perPage;
    public $searchTerm;

    public function updatedPerPage(): void
    {
        $this->emit('perPageUpdated', $this->perPage);
    }

    public function updatedSearchTerm(): void
    {
        $this->emit('searchTermUpdated', $this->searchTerm);
    }

    public function render()
    {
        return view('livewire.forms');
    }
}
