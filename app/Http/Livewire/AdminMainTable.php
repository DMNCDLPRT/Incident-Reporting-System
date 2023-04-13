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

    public $search = '';

    public function render()
    {
        $reports = Reports::with('reports')
            ->when($this->search, function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('event', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%')
                    ->orWhere('victims', 'like', '%' . $this->search . '%')
                    ->orWhere('suspects', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        if ($this->search) {
            foreach($reports as $report){
                $reportIds = $report->pluck('report_id')->toArray();
                $incidents[] = FacadesDB::table('report_types')
                    ->whereIn('id', $reportIds)
                    ->latest()
                    ->get();
            }
            if($reports->isEmpty()) {
                $reports =[];
                $incidents = [];
    
                session()->flash('message', 'No Incidents found');
            }
        } else {
            foreach($reports as $report) {
                $incidents[] = FacadesDB::table('report_types')->where('id', $report->report_id)->latest()->get();
            }

            if($reports->isEmpty()) {
                $reports =[];
                $incidents = [];
    
                session()->flash('message', 'No Incidents found');
            }
        }
        return view('livewire.admin.admin-main-table', ['reports' => $reports, 'incidents' => $incidents]);
    }

    /* use WithPagination;

    public $search = '';

    public function render()
    {
        $reports = Reports::with(['reports', 'user'])
            ->when($this->search, function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('event', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%')
                    ->orWhere('victims', 'like', '%' . $this->search . '%')
                    ->orWhere('suspects', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        $incidents = [];

        if ($this->search) {
            foreach ($reports as $report) {
                $incidents[] = $report->reports;
            }

            if ($reports->isEmpty()) {
                $reports = [];
                $incidents = [];

                session()->flash('message', 'No Incidents found');
            }
        } else {
            foreach ($reports as $report) {
                $incidents[] = $report->reports()->latest()->get();
            }

            if ($reports->isEmpty()) {
                $reports = [];
                $incidents = [];

                session()->flash('message', 'No Incidents found');
            }
        }

        return view('livewire.admin.admin-main-table', ['reports' => $reports, 'incidents' => $incidents]);
    } */
}
