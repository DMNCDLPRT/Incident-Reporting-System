<?php

namespace App\Http\Livewire\Portal;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reports;
use Illuminate\Support\Facades\DB as FacadesDB;

class Table extends Component
{
    /* public $reports;
    public $location;
    public $incidents;

    public function mount($reports, $location, $incidents)
    {
        $this->reports = $reports;
        $this->location = $location;
        $this->incidents =$incidents;
    }

    public function render()
    {
        

        return view('livewire.portal.table');
    } */

    use WithPagination;

    public function render()
    {
         $user = auth()->user();
         /*
        $reports = Reports::with('assigns')->paginate(15);

        dd($reports); */

        $reports = Reports::where('userId', $user->id)->paginate(5);

        if($reports->isEmpty())
        {
            $incidents = [];
            return view('livewire.portal.table')->with(['user' => $user, 'reports' => $reports, 'incidents' => $incidents]);
        }

        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')->where('id', $report->id)->latest()->get();
        }

        return view('livewire.portal.table', compact('reports'));
    }
}
