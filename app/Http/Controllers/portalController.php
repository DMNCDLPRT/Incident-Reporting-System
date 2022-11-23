<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Http\Requests\ReportIncident;

class portalController extends Controller
{
    public function index()
    {
        return view ('portal.portal');
    }

    public function create(ReportIncident $report) {
        
    }

/*     public function store(ReportIncident $request)
    {
        $post = $request->validated();
        $post = Reports::create($post);
        return redirect('portal')->with('flash_message', 'Incident succesfully Reported!'); 
    } */

    public function show() {

    } 
}
