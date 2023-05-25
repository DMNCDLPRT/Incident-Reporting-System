<?php

namespace App\Http\Livewire;

use App\Models\Reports;
use Carbon\Carbon;
use Livewire\Component;

class AdminLatestReports extends Component
{
    public $reports;

    public function mount($reports){
        
        /* 
        $monday = [];
        $tuesday = [];
        $wednesday = [];
        $thursday = [];
        $friday = [];
        $saturday = [];
        $sunday = []; 
        */

        $monday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::MONDAY))->count(); // Monday
        $tuesday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::TUESDAY))->count(); // Tuesday
        $wednesday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::WEDNESDAY))->count(); // Wednesday
        $thursday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::THURSDAY))->count(); // Thursday
        $friday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::FRIDAY))->count(); // Friday
        $saturday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::SATURDAY))->count(); // Saturday
        $sunday = Reports::whereDate('created_at', Carbon::now()->startOfWeek()->next(Carbon::SUNDAY))->count(); // Sunday

        $reports = ['monday' => $monday, 'tuesday' => $tuesday, 'wednesday' => $wednesday, 'thursday' => $thursday, 'friday' => $friday, 'saturday' => $saturday, 'sunday' => $sunday];
        
        // dd($reports);

        $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.admin.admin-latest-reports');
    }
}
