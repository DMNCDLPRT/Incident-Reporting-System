<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;

class Reports extends Component
{
    public $reports;
    public $incidents;
    public $count;
    public $sum;

    public function mount($reports, $incidents, $count, $sum)
    {
       $this->reports = $reports;
       $this->incidents = $incidents;
       $this->count = $count;
       $this->sum = $sum;
    }

    public function render()
    {
        return view('livewire.portal.reports');
    }
}
