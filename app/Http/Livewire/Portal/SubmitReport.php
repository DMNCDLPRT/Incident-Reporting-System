<?php

namespace App\Http\Livewire\Portal;

use App\Http\Requests\ReportIncident;
use App\Models\Reports;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitReport extends Component
{
    use WithFileUploads;

    public $file;

    public $incidentType;

    public $location;

    public $specificLocation;

    /* public function mount() {

    } */

    public function submitForm(ReportIncident $request) {
        
        $submitReport = $this->validate($request);
        dd($submitReport);
        $submitReport = Reports::create($submitReport); 
    }

    public function render()
    {
        return view('livewire.portal.submit-report');
    }
}
