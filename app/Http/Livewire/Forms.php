<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Forms extends Component
{
    public $qp;
    public $perPage;
    public $searchTerm;

    public function updatedPerPage()
    {
        $this->emit('perPageUpdated', $this->perPage);
    }

    public function updatedSearchTerm()
    {
        $this->emit('searchTermUpdated', $this->searchTerm);
    }

    public function render()
    {
        return view('livewire.forms');
    }
}
