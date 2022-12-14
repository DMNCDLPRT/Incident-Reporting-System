<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminTypesOfReportByPercent extends Component
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
        return view('livewire.admin.admin-types-of-report-by-percent');
    }
}
