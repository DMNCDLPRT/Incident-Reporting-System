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
        $now = Carbon::now();
        $startOfWeek = $now->startOfWeek()->format('Y-m-d H:i');
        $endOfWeek = $now->endOfWeek()->format('Y-m-d H:i');

        //$startOfWeek =  $now->startOfWeek(Carbon::MONDAY);
        //$endOfWeek  = $now->endOfWeek(Carbon::SATURDAY);

        $week = Reports::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        $reports = $week;
        $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.admin.admin-reports-this-week');
    }
}
