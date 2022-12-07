<?php

namespace App\Http\Livewire\Portal;

use App\Http\Controllers\portalController;
use App\Http\Requests\ReportIncident;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Reports;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\Routing\Route;

class SubmitReport extends Component
{
    use AuthorizesRequests;

    use WithFileUploads;

    /**
     * Report Type
     *
     * @var string
     */
    public $report_id;

    /**
     * Report location
     *
     * @var string
     */
    public $location_id;

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
            'report_id' => 'required',
            'location_id' => 'required',
            'specificLocation' => 'required|string',
            'files' => 'required|image|max:10240',
        ];
        
    }

    public function submitForm() {
        
        $submitReport = $this->validate();
        $submitReport['userId'] = auth()->id();
        $submitReport['teamid'] = auth()->user()->currentTeam->id;

        Reports::create($submitReport); 

        session()->flash('message', 'Incident Successfully Reported');

        
    }

    public function SMS()
    {
        $cell_num = ['639774347454', '09103634532'];

        if($this->report_id == 1)
        {
            $cell_num[1];
        }
        else if($this->report_id == 2)
        {
            $cell_num[2];
        } 
        else{
            $cell_num;
        }
    }

    public function render()
    {
        return view('livewire.portal.submit-report');
    }
}
