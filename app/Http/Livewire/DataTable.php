<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $qp;
    public $searchTerm;
    public $sortField;
    public $sortOrder;
    public $perPage;

    protected $queryString = [
        'perPage',
        'searchTerm' => ['except' => ''],
        'sortField',
        'sortOrder'
    ];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'perPageUpdated' => 'updatePerPage',
        'searchTermUpdated' => 'updateSearchTerm'
    ];

    public function updatePerPage($perPage): void
    {
        $this->perPage = $perPage;
    }

    public function updateSearchTerm($searchTerm): void
    {
        $this->searchTerm = $searchTerm;

        $this->resetPage();
    }

    public function updateSortField($sortField): void
    {
        if ($this->sortField === $sortField) {
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        }
        $this->sortField = $sortField;
    }

    public function getContactsProperty(): LengthAwarePaginator
    {
        return Contact::query()
            ->where('name', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
            ->orderBy($this->sortField, $this->sortOrder)
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.data-table');
    }
}
