<?php

namespace App\Http\Livewire;
use App\Models\Drug;
use Livewire\WithPagination;

use Livewire\Component;

class SearchDrugs extends Component
{
    use WithPagination;

    public $search = '';
    public $foo;
    public $page = 1;

    
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-drugs', [
            'drugs' => Drug::where('group', 'ilike', '%'.$this->search.'%')
            ->orWhere('subgroup', 'ilike', '%'.$this->search.'%')
            ->orWhere('scientificname', 'ilike', '%'.$this->search.'%')
            ->orWhere('tradename', 'ilike', '%'.$this->search.'%')
            ->orderBy('id')
            ->Simplepaginate(25),
        ]);
    }
}
