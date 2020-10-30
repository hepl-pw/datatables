<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class DataTable extends Component
{
    public $qp;
    public $searchTerm;
    public $sortField;
    public $perPage;

    protected $contacts;

    public function render()
    {
        $this->contacts = Contact::query()
            ->where('name', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortField)
            ->paginate($this->perPage);

        return view('livewire.data-table', ['contacts' => $this->contacts]);
    }
}
