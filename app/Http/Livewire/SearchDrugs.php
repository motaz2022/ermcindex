<?php

namespace App\Http\Livewire;
use App\Models\Drug;
use Livewire\WithPagination;

use Livewire\Component;

class SearchDrugs extends Component
{

    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-drugs', [
            'drugs' => Drug::where('group', 'like', '%'.$this->search.'%')
            ->orWhere('subgroup', 'like', '%'.$this->search.'%')
            ->orWhere('scientificname', 'like', '%'.$this->search.'%')
            ->orWhere('tradename', 'like', '%'.$this->search.'%')
            ->orderBy('id')
            ->Simplepaginate(30),
        ]);
    }
}
