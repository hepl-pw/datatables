<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Forms extends Component
{
    public $qp;
    public $perPage;
    public $searchTerm;

    public function render()
    {
        return view('livewire.forms');
    }
}
