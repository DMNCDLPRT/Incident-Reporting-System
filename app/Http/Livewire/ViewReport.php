<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewReport extends Component
{

    public $report;

    public function mount($report) 
    {
        $this->report = $report;
    }


    public function render()
    {
        return view('livewire.admin.view-report');
    }
}
