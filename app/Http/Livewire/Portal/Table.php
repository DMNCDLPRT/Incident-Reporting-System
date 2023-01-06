<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Table extends Component
{
    public $reports;
    public $unique;
    public $incident;
    
    public function mount($reports, $unique, $incident) 
    {
        $this->reports = $reports;
        $this->unique = $unique;
        $this->incident = $incident;
    }

    public function render()
    {
        return view('livewire.portal.table');
    }
}
