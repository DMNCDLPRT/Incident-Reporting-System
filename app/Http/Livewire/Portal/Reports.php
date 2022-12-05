<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Reports extends Component
{
    public $reports;

    public function mount($reports)
    {
       $this->report = $reports;
    }

    public function render()
    {
        return view('livewire.portal.reports');
    }
}
