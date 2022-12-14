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
        $reports = Reports::with('reports')->get();

        return view ('portal.publicReports')->with('reports', $reports);
    }

    public function store(ReportIncident $request)
    {
        $post = $request->validated();
        $post = Reports::create($post);
        return redirect('portal')->with('flash_message', 'Incident succesfully Reported!'); 
    }

}
