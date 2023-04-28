<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class UserViewReport extends Component
{
    public $report;
    public $incident;
    public $reporter;

    public function mount($report, $incident, $reporter) 
    {
        $this->report = $report;
        $this->incident = $incident;
        $this->reporter = $reporter;
    }
    
    public function render()
    {
        return view('livewire.portal.user-view-report');
    }
}
