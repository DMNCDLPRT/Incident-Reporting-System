<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Http\Requests\ReportIncident;
use App\Models\ReportType;
use App\Models\cellNumber;
use App\Models\AssignedDepartment;
use Illuminate\Support\Facades\DB as FacadesDB;
use Carbon\Carbon;

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
        $reports = Reports::with('reports')->get();

        return view ('portal.publicReports')->with('reports', $reports);
    }

    public function store(ReportIncident $request)
    {
        $post = $request->validated();
        $post = Reports::create($post);
        return redirect('portal')->with('flash_message', 'Incident succesfully Reported!'); 
    }

    public function contact($report_id)
    {
        $id = (int)$report_id;
        $assign = FacadesDB::table('assigns')->where('incidents_id', $id)->get(); 

        $cell = [];
        foreach($assign as $assigns){
            $cell[] = FacadesDB::table('contacts')->where('department_id', $assigns->department_id)->get();   
        }

        return $cell;
    }

    public function message($words)
    {
        $incidentId = (int)$words[0];
        $locationId = (int)$words[1];

        $incident = FacadesDB::table('report_types')->where('id', $incidentId)->get();
        $location = FacadesDB::table('locations')->where('id', $locationId)->get();
        $time = Carbon::now()->toDateTimeString()/* ->format('d/m/y/') */;

        $words = [
            "Incident Type: ", $incident[0]->report_name, 
            "\nLocation: ", $location[0]->location_name,
            "\n\nSpecific Location: ", $words[2],
            "\nDate: ", $time
        ];
        function join_words($words) {
            $return = [];
            for ($i=0; $i < count($words); $i++) {
                $return[] = implode(' ', array_slice($words, 0, $i+1));
            }
            return $return;
        }
        $result = [];
        $result = array_merge($result, join_words($words));
        $message = end($result);

        return $message;
    }
}