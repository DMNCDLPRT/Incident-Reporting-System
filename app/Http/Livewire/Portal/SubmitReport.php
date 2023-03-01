<?php

namespace App\Http\Livewire\Portal;

use App\Http\Livewire\AssignDepartments;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Reports;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\portalController;

use function PHPUnit\Framework\isNull;

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
     * Report description
     *
     * @var string
     */
    public $suspects;
    
    /**
     * Report description
     *
     * @var string
     */
    public $victims;
    
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
     * Report event
     *
     * @var string
     */
    public $event;

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
            'victims' => 'string',
            'suspects' => 'string',
            'event' => 'string|nullable',
            /* 'location_id' => 'required',
            'specificLocation' => 'required|string', */
            'files' => 'nullable|sometimes|image|max:10240',
        ];
    }

    public function submitForm() 
    {
        $submitReport = $this->validate();

        // dd($submitReport);

        // dd($submitReport['files']);
        $contact = new portalController;
        $nums = $contact->contact($submitReport['report_id']);

        $array = [];
        foreach($nums as $num){
            $i = 0;
            $array[] = $num[$i]->number;
            $i + 1;
        }

        // making array of cell numbers into string
        // contact number
        function join_nums($array) {
            $return = [];
            for ($i=0; $i < count($array); $i++) {
                $return[] = implode(', ', array_slice( $array, 0, $i+1));
            }
            return $return;
        }
        
        $contact = [];
        $contact = array_merge($contact, join_nums( $array));
        // $contact = join_nums( $array);

        if (count($array) > 1) {
            // array is more than 0
            $number = end($contact);
        } else {
            // array is 0
            $number = $contact[0];
        }

        // function for making array into string 
        // text message
        $controller = new portalController;
        $words = [$submitReport['report_id'], $submitReport['victims'], $submitReport['event'], $submitReport['suspects']];
        $message = $controller->message($words);

        
        // SEMAPHORE - text messagin API
        $ch = curl_init();
        $parameters = array(
            'apikey' => env('SEMAPHORE_API_KEY'), // YOUR SEMAPHORE API KEY
            'number' => $number,
            'message' => $message,
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        // Show the server response
        // echo $output;
        
        if($submitReport['files'] == null){
            $submitReport['files'] = null;
        } else {
            $name = $submitReport['files']->getClientOriginalName(); // getting the original image name
            $submitReport['files']->storeAs('public/reports', $name);
            $submitReport['files'] = $name;
        }

        if(Auth()->user()) {
            $submitReport['userId'] = auth()->id();  // get the user id of the reporter
        } else {
            $submitReport['userId'] = null;
        }
        
        // dd($submitReport['files']);

        Reports::create($submitReport); // create/submit report - store to database

        $this->reset(['suspects', 'victims', 'files', 'report_id', 'event']); // reset all user input

        session()->flash('output', $output);
        session()->flash('message', /* $output */ 'Incident Succefully Reported');

        }
    // 454 - globe - ako
    // 421 - TM - mama 1 
    // 723 - smart - mama 2

    // public $contact = ['09774347454', '09532514421', '09606428723', '09103634532'];

    public $incidents;
    public $locations;

    public function mount($incidents, $locations)
    {
       $this->incidents = $incidents;
       $this->locations = $locations;
    }

    public function render()
    {
        return view('livewire.portal.submit-report');
    }
}
