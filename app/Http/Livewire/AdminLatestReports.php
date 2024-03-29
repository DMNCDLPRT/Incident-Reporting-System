<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminLatestReports extends Component
{
    public $reports;
    
    public function mount($reports) 
    {
        $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.admin.admin-latest-reports');
    }
}
