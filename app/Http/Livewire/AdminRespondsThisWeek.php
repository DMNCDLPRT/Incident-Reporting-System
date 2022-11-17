<?php

namespace App\Http\Livewire;

use App\Models\Reports;
use Livewire\Component;

class AdminRespondsThisWeek extends Component
{

    public $reports;

    public function mount($reports)
    {
        $this->reports = $reports;
    }
    
    public function render()
    {
        return view('livewire.admin.admin-responds-this-week');
    }
}
