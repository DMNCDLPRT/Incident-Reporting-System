<?php

namespace App\Http\Controllers;

use App\Models\AssignDepartment;
use App\Models\AssignedDepartment;
use App\Models\cellNumber;
use App\Models\Departments;
use App\Models\Reports;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Support\Facades\DB as FacadesDB;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Reports::with('reports', 'locations')->get();

        foreach($reports as $report){
            $location[] = FacadesDB::table('locations')->where('id', $report->location_id)->get();
        }

        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')->where('id', $report->report_id)->get();
        }

        return view ('admin.adminDashboard')->with(['reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
    }

    public function admin()
    {
        $numbers = Departments::with('cellnum')->get();
        $assigned = AssignedDepartment::with('incidents')->get();
        $incidents = ReportType::all();
        $department = AssignedDepartment::with('assignedTo')->get();

        
        // $assign = FacadesDB::table('assigns')->where('')->get();
        

        return view('admin.admin')->with(['numbers' => $numbers, 'incidents' => $incidents, 'assigned' => $assigned]);
    }

    public function report()
    {
        $report = Reports::latest()->take(10)->get();
        
        $users = User::get($report->userId)->get();

        dd($users);
        return view ('admin.adminReport')->with('report', $report);
    }

    public function destroy($id)
    {
        cellNumber::destroy($id);
        return redirect('admin/admin')->with('flash_message', 'Post deleted successfully!');
    }

    public function edit($id)
    {
        $numbers = cellNumber::find($id);
        if($numbers->department == null)
        {   
            return session()->flash('message-edit', 'No Contact Numbers is assignd');
        }
        else 
        {
            return view('admin.editNum')->with('numbers', $numbers);  
        }
    }

    public function destroyReport($id)
    {
        Reports::destroy($id);
        return redirect('admin/dashboard')->with('flash_message', 'Post deleted successfully!');
    }

    public function viewReport($id)
    {
        $report = Reports::where('id', $id)->get();

        return view('admin.viewReport')->with('report', $report);
    }
}