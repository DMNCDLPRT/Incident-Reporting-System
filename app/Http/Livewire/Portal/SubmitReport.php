<?php

namespace App\Http\Livewire\Portal;

use App\Http\Requests\ReportIncident;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Reports;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitReport extends Component
{
    use AuthorizesRequests;

    use WithFileUploads;

    /**
     * Report Type
     *
     * @var string
     */
    public $reportType;

    /**
     * Report location
     *
     * @var string
     */
    public $location;

    /**
     * Report specificlocation
     *
     * @var string
     */
    public $specificLocation;

    /**
     * Report file
     *
     * @var string
     */
    public $files;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,mixed>
     */
    public function rules()
    {
    
        return [
            'files' => 'required|image|max:1024',
            'reportType' => 'required',
            'location' => 'required',
            'specificLocation' => 'required|string'
        ];
        
    }

    public function submitForm(/* ReportIncident $request */) {
        
        $submitReport = $this->validate();
        $submitReport['userId'] = auth()->id();
        $submitReport['teamid'] = auth()->user()->currentTeam->id;

        Reports::create($submitReport); 
    }

    public function render()
    {
        return view('livewire.portal.submit-report');
    }
}
