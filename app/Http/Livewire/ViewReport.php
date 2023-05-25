<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewReport extends Component
{
    public $report;
    public $incident;
    public $location;
    public $reporter;

    public function mount($report, $incident, $location, $reporter) 
    {
        $this->report = $report;
        $this->incident = $incident;
        $this->location = $location;
        $this->reporter = $reporter;
    }

    public function render()
    {
        return view('livewire.admin.view-report');
    }
}