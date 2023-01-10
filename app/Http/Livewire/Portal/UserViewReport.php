<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class UserViewReport extends Component
{
    public $report;
    public $incident;
    public $location;
    public $reporter;

    public function mount( $report, $incident, $location, $reporter) 
    {
        $this->report = $report;
        $this->incident = $incident;
        $this->location = $location;
        $this->reporter = $reporter;
    }
    
    public function render()
    {
        return view('livewire.portal.user-view-report');
    }
}
