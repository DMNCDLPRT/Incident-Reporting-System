<?php

namespace App\Http\Livewire\Portal;

use App\Http\Livewire\AssignDepartments;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Reports;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\portalController;


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


    public function submitForm() 
    {
        $submitReport = $this->validate();

        $contact = new portalController;
        $nums = $contact->contact($submitReport['report_id']);

        
        foreach($nums as $num){
            $array = [$num->number];
        }

        // making array of cell numbers into string
        // contact number
        function join_nums( $array) {
            $return = [];
            for ($i=0; $i < count($array); $i++) {
                $return[] = implode(', ', array_slice( $array, 0, $i+1));
            }
            return $return;
        }

        $contact = [];
        $contact = array_merge($contact, join_nums( $array));

        dd($contact);

        $submitReport['userId'] = auth()->id();
       
        Reports::create($submitReport);
        $name = $submitReport['files']->getClientOriginalName(); // getting the original image name
        $submitReport['files']->storeAs('public/images/',$name); // storing image to public/images folder

        // function for making array into string 
        // text message
        $words = [$submitReport['report_id'], $submitReport['location_id'], $submitReport['specificLocation']];
        function join_words($words) {
            $return = [];
            for ($i=0; $i < count($words); $i++) {
                $return[] = implode(' ', array_slice($words, 0, $i+1));
            }
            return $return;
        }
        $result = [];
        $result = array_merge($result, join_words($words));
    
        // SEMAPHORE - text messagin API
        $ch = curl_init();
        $parameters = array(
            'apikey' => env('SEMAPHORE_API_KEY'), //Your API KEY
            'number' => $contact,
            'message' => $result[2],
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

        //Show the server response
        // echo $output;

        session()->flash('message', /* $output */ 'Incident Succefully Reported');
    }

    // 454 - globe - ako
    // 421 - TM - mama 1
    // 723 - smart - mama 2

    // public $contact = ['09774347454', '09532514421', '09606428723', '09103634532'];

    public function render()
    {
        return view('livewire.portal.submit-report');
    }
}
