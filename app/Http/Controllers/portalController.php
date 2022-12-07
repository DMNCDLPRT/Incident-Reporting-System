<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Http\Requests\ReportIncident;
use App\Models\ReportType;

class portalController extends Controller
{
    public function index()
    {
        return view ('portal.portal');
    }

    public function user()
    {
        $user = auth()->user();

        $reports = Reports::where('userId', $user->id)->get();

        $data = [$user, $reports];

        return view ('portal.userProfile', ['data' => $data]);
    }

    public function reports() {
        $reports = Reports::with('report_types')->get();

        return view ('portal.publicReports')->with('reports', $reports);
    }

    public function store(ReportIncident $request)
    {
        $post = $request->validated();
        $post = Reports::create($post);
        return redirect('portal')->with('flash_message', 'Incident succesfully Reported!'); 
    }

    public function sendSMS($recipients) {
        $ch = curl_init();
        $parameters = array(
            'apikey' => env("SEMAPHORE_API_KEY"), //Your API KEY
            'number' => $recipients,
            'message' => 'I just sent my first message with Semaphore',
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
        echo $output;
    } 
}
