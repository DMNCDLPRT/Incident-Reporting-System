<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Reports extends Component
{
    public $reports;
    public $incidents;

    public function mount($reports, $incidents)
    {
       $this->reports = $reports;
       $this->incidents = $incidents;
    }

    public function render()
    {
        return view('livewire.portal.reports');
    }
}
