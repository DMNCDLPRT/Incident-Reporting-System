<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Table extends Component
{
    public $reports;
    public $location;
    public $incidents;

    public function mount($reports, $location, $incidents)
    {
        $this->reports = $reports;
        $this->location = $location;
        $this->incidents =$incidents;
    }

    public function render()
    {
        return view('livewire.portal.table');
    }
}
