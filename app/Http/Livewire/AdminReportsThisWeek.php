<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reports;
use Carbon\Carbon;

class AdminReportsThisWeek extends Component
{

    public $reports;

    public function mount($reports)
    {
        $week = Reports::whereDate('reported_on', Carbon::now()->startOfWeek(Carbon::MONDAY)->endOfWeek(Carbon::SATURDAY))->get();

        $reports = $week;
        $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.admin.admin-reports-this-week');
    }
}
