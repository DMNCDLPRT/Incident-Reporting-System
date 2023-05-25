<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;
use App\Models\Reports;
use Illuminate\Support\Facades\DB as FacadesDB;

class ReportsInEveryLocation extends Component
{

    public $locations;
    public $incident;
    public $count;
    public $sum;

    public function mount($incident, $count, $sum)
    {
        $reports = Reports::with('reports', 'locations')->get();

        if($reports->isEmpty()){
            $reports = [];
            $incident = [];
            $count = [];
        }
        /*  foreach(){
            $location[] = FacadesDB::table('');
        } 
        */

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
        return view('livewire.admin.reports-in-every-location');
    }
}
