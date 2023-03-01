<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Http\Requests\ReportIncident;
use App\Models\ReportType;
use App\Models\cellNumber;
use App\Models\AssignedDepartment;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\DB as FacadesDB;
use Carbon\Carbon;

class portalController extends Controller
{
    public function index()
    {
        $incidents = ReportType::all();
        $locations = Location::all();

        return view ('portal.portal', ['incidents' => $incidents, 'locations' => $locations]);
    }

    public function user()
    {
        $user = auth()->user();
        $reports = Reports::where('userId', $user->id)->get();

        if($reports->isEmpty())
        {
            $location = [];
            $incidents = [];
            return view('portal.userProfile')->with(['user' => $user, 'reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
        }

        foreach($reports as $report){
            $location[] = FacadesDB::table('locations')->where('id', $report->location_id)->latest()->get();
        }

        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')->where('id', $report->id)->latest()->get();
        }

        // dd($user, $reports, $location);

        return view('portal.userProfile')->with(['user' => $user, 'reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
    }

    public function userViewReport($id){
        $report = Reports::where('id', $id)->first();

        $location = FacadesDB::table('locations')->where('id', $report->location_id)->get();
        $incident = FacadesDB::table('report_types')->where('id', $report->report_id)->get();
        $reporter = FacadesDB::table('users')->where('id', $report->userId)->get();

        // dd($report, $location, $incident);
        return view('portal.userViewReport')->with(['report' => $report, 'location' => $location, 'incident' => $incident, 'reporter' => $reporter]);
    }

    public function reports() {
        $reports = Reports::with('reports')->get();

        if($reports->isEmpty()){
            $reports = [];
            $incidents = [];
            $count = [];
        }

        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')->where('id', $report->report_id)->get();
        }

        $uniques = array_unique($incidents);     // $votes = Vote::where('vote_type',1)->where('something',$something)->count();
      
        // dd($uniques, $reports);
        
        $i = 0;
        foreach($uniques as $unique){
            $count[] = $reports->where('report_id', $unique[$i]->id)->count();
            $i + 1;
        }

        $sum = array_sum($count);

        return view ('portal.publicReports')->with(['reports' => $reports, 'count' => $count,'incidents' => $incidents, 'sum' => $sum]);
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

        $incident = FacadesDB::table('report_types')->where('id', $incidentId)->get();
        $time = Carbon::now()->toDateTimeString()/* ->format('d/m/y/') */;

        $words = [
            "Incident Type: ", $incident[0]->report_name,
            "\nNumber of Victims: ", $words[1],
            "\nIncident other info: ", $words[2], 
            "\nNumber of Suspects: ", $words[3],
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