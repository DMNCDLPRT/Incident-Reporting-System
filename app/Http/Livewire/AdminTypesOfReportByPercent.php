<?php

namespace App\Http\Livewire;

use App\Models\Reports;
use Illuminate\Support\Facades\DB as FacadesDB;
use Livewire\Component;
use Carbon\Carbon;

class AdminTypesOfReportByPercent extends Component
{
    public $incident;
    public $count;
    public $sum;

    public function mount($incident, $count, $sum)
    {
        // Get all reports created during the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $reports = Reports::whereBetween('created_at', [$startOfWeek, $endOfWeek])->with('reports')->get();

        if($reports->isEmpty()){
            $reports = [];
            $incident = [];
            $count = [];
        }

        foreach($reports as $report){
            $incident[] = FacadesDB::table('report_types')->where('id', $report->report_id)->get();
        }

        $uniques = array_unique($incident);     // $votes = Vote::where('vote_type',1)->where('something',$something)->count();
      
        $i = 0;
        foreach($uniques as $unique){
            $count[] = $reports->where('report_id', $unique[$i]->id)->count();
            $i + 1;
        }

        $sum = array_sum($count);

        $this->incident = $incident;
        $this->count = $count;
        $this->sum = $sum;
    }
    public function render()
    {
        return view('livewire.admin.admin-types-of-report-by-percent');
    }
}
