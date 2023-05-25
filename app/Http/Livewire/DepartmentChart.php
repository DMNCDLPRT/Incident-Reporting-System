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

    public function mount(){
        $departments = Departments::pluck('department');
    
        $incidents = FacadesDB::table('assigns')
                        ->join('reports', 'assigns.incidents_id', '=', 'reports.report_id')
                        ->whereBetween('reports.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->select('assigns.department_id', FacadesDB::raw('count(*) as count'))
                        ->groupBy('assigns.department_id')
                        ->get()
                        ->keyBy('department_id')
                        ->map(fn($item) => $item->count);
    
        $this->departments = $departments;
        $this->count = $incidents->values()->toArray();
    }
    

    public function render()
    {
        return view('livewire.admin.department-chart');
    }
}
