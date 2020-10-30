<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $qp;
    public $searchTerm;
    public $sortField;
    public $perPage;

    protected $contacts;
    protected $queryString = ['perPage', 'searchTerm'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'perPageUpdated' => 'updatePerPage',
        'searchTermUpdated' => 'updateSearchTerm'
    ];

    public function updatePerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function updateSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

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
