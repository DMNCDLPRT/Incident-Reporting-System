<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Reports;

class AdminReportsThisDay extends Component
{
    public $reports;

    public function mount($reports)
    {
        $day = Reports::whereDate('reported_on', Carbon::today())->get();
        $reports = $day;
        $this->reports = $reports;
    }
    
    public function render()
    {
        return view('livewire.admin.admin-reports-this-day');
    }
}
