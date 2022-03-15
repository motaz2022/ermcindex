<?php

namespace App\Http\Livewire;
use App\Models\Alert;

use Livewire\Component;

class ShowAlerts extends Component
{
    public function render()
    {
        return view('livewire.show-alerts', [
            'alerts' => Alert::orderBy('date', 'desc')->get()
        ]);
    }
}
