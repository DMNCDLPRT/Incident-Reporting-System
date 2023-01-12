<?php

namespace App\Http\Livewire;

use App\Models\Departments;
use App\Models\Reports;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class DepartmentChart extends Component
{
    public $departments;
    public $count;

    public function mount($departments, $count){

        $departments = Departments::all();

        foreach ($departments as $department) {
            $name[] = $department->department;
        }

        foreach($departments as $department){
            $assigns[] = FacadesDB::table('assigns')->where('department_id', $department->id)->get();
        }
        $now = Carbon::now();
        $startOfWeek = $now->startOfWeek()->format('Y-m-d H:i');
        $endOfWeek = $now->endOfWeek()->format('Y-m-d H:i');

        $reports = Reports::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        
        foreach($reports as $report){
            $i[] = $report->report_id;
        }
        
        $i = 0;
        foreach($assigns as $assign){
            
            $incidents[] = $reports->where('report_id', $assign[$i]->incidents_id)->count(); 
            $i+1;
            
        }
        
        $count = $incidents;
        // dd($incidents);

        $this->departments = $name;
        $this->count = $count;
    }

    public function render()
    {
        return view('livewire.admin.department-chart');
    }
}
