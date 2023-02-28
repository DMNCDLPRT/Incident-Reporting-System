<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\Reports;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB as FacadesDB;
use Livewire\WithPagination;

class AdminMainTable extends Component
{
    use WithPagination;

    /* public $location;
    public $incidents;

    public function mount($location, $incidents) 
    {

        $this->location = $location;
        $this->incidents = $incidents;
    } */


    public $query;

    public function search()
    {
        $model = Reports::with('reports', 'locations')->latest();

        $reports = Reports::where('id', 'like', "%{$this->query}%")
            ->orWhere('event', 'like', "%{$this->query}%")
            ->orWhere('status', 'like', "%{$this->query}%")
            ->orWhere('created_at', 'like', "%{$this->query}%")
            ->latest()->paginate(10);

        foreach($reports as $report){
            $location[] = FacadesDB::table('locations')
                ->where('id', $report->location_id)->latest()->get();
        }
        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')
                ->where('id', $report->report_id)->latest()->get();
        }
        
        return view('livewire.admin.admin-main-table', ['reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
    }

    public function render()
    {
        if($this->query == null){

            $reports = Reports::with('reports', 'locations')->latest()->paginate(10);

            foreach($reports as $report){
                $location[] = FacadesDB::table('locations')->where('id', $report->location_id)->latest()->get();
            }
    
            foreach($reports as $report){
                $incidents[] = FacadesDB::table('report_types')->where('id', $report->report_id)->latest()->get();
            }

            if($reports->isEmpty()) {
                $reports =[];
                $location = [];
                $incidents = [];
            }

            return view('livewire.admin.admin-main-table', ['reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
        } 

        $query = new AdminMainTable();
        return $query->search();
    }
}
