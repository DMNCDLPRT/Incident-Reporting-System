<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reports;
use Carbon\Carbon;

class AdminRespondsThisMonth extends Component
{

    public $reports;

    public function mount($reports)
    {
        $startDate = Carbon::now(); //returns current day
        $firstDay = $startDate->firstOfMonth();  

        $month = Reports::whereMonth('created_at', "=", $firstDay)->get();
        // $data = DB::table('table_name')->whereMonth('date_column', '=', $month)->get();

        $reports = $month;
        $this->reports = $reports;
    }

    public function render()
    {
        return view('livewire.admin.admin-responds-this-month');
    }
}
