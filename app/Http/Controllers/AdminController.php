<?php

namespace App\Http\Controllers;

use App\Models\AssignedDepartment;
use App\Models\cellNumber;
use App\Models\Departments;
use App\Models\Reports;
use App\Models\ReportType;
use App\Models\TextLog;
use App\Models\User;
use Illuminate\Support\Facades\DB as FacadesDB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Pagination\PaginationServiceProvider;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    public function index() 
    {
        $reports = Reports::with('reports', 'locations')->paginate(15);

        $location = [];
        $incidents = [];
        $incident = [];
        $count = [];
        $sum = [];
        $departments = [];

        return view ('admin.adminDashboard')->with(['reports' => $reports, 'location' => $location, 'incidents' => $incidents, 'incident' => $incident, 'count' => $count, 'sum' => $sum, 'departments' => $departments]);
    }

    public function admin()
    {
        $numbers = Departments::with('cellnum')->get();
        $incidents = ReportType::all();
        // $assigned = AssignedDepartment::with('incidents')->get();

        // dd($numbers);
        foreach($numbers as $number){
           $departments[] = $number->id;
        }
        
        foreach($departments as $department){
            $assigns[] = FacadesDB::table('assigns')->where('department_id', $department)->get();
        }

        return view('admin.admin')->with(['numbers' => $numbers, 'incidents' => $incidents, 'assigns' => $assigns]);
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
        Departments::destroy($id);
        return view('admin.admin')->with('flash_message', 'Post deleted successfully!');
    }

    public function edit($id)
    {
        $numbers = cellNumber::find($id);
        if($numbers->department == null) {   
            return session()->flash('message-edit', 'No Contact Numbers is assignd');
        }
        else {
            return view('admin.editNum')->with('numbers', $numbers);  
        }
    }

    // view assigned numbers and incidents to a department
    public function view($id)
    {
        $department = departments::find($id);
        $cell = cellNumber::where('department_id', $id)->get();
        $assigns = FacadesDB::table('assigns')->where('department_id', $id)->get();

        if($assigns->isEmpty()){
            $incidents = [];
            $assigns = [];
            $values = [];
            return view('admin.viewDepartment')->with(['assigns' => $assigns, 'values' => $values, 'department' => $department, 'incidents' => $incidents, 'cell' => $cell]);  
        }
        
        $incidents = [];
        foreach($assigns as $assign){
            $incident = ReportType::where('id', $assign->incidents_id)->first();
            if($incident){
                $incidents[] = $incident;
            }
        }

        $values = $assigns->pluck('id')->toArray();
        
        // dd($assigns);
        return view('admin.viewDepartment')->with(['assigns' => $assigns, 'values' => $values, 'department' => $department, 'incidents' => $incidents, 'cell' => $cell]);  
    }

    // delete report - Route::middleware(rele:super-admin)->...
    public function destroyReport($id)
    {
        Reports::destroy($id);
        return view('admin.adminDashboard')->with('flash_message', 'Post Deleted successfully!');
    }

    public function viewReport($id)
    {
        $report = Reports::where('id', $id)->first();
        $location = FacadesDB::table('locations')->where('id', $report->location_id)->get();
        $incident = FacadesDB::table('report_types')->where('id', $report->report_id)->get();

        if (isNull($report->userId)) {
            $reporter = [];
        } else {
            $reporter = FacadesDB::table('users')->where('id', $report->userId)->get();
        }

        // dd($reporter);

        if($report->status == 'processing') {
            $report->status = 'Read';
            $report->save();
        }

        return view('admin.viewReport')->with(['report' => $report, 'location' => $location, 'incident' => $incident, 'reporter' => $reporter]);
    }

    public function viewTextLog() {
        // $textlogs = TextLog::paginate(15);
    
        $textlogs = [];
        // dd($textlogs);
        return view('admin.viewTextLog')->with(['textlogs' => $textlogs]);
    }

    public function users() {
        $users = User::latest()->paginate(1);

        return view('admin.UsersRoles')->with('users', $users);
    }

    public function viewUser($id)
    {
        $user = User::where('id', $id)->get();
        $count = Reports::where('userId', $id)->get();
        $reports = Reports::with('reports', 'locations')->where('userId', $id)->latest()->get();

        if($reports->isEmpty()){
            $location = [];
            $incidents = [];
            return view('admin.viewUser')->with(['user' => $user, 'count' => $count, 'reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
        }

        foreach($reports as $report){
            $location[] = FacadesDB::table('locations')->where('id', $report->location_id)->latest()->get();
        }

        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')->where('id', $report->id)->latest()->get();
        }

        return view('admin.viewUser')->with(['user' => $user, 'count' => $count, 'reports' => $reports, 'location' => $location, 'incidents' => $incidents]); 
    }

    // Delete User - Route::middleware(rele:super-admin)->...
    public function deleteUser($id)
    {
        if(Auth()->user()->id == $id) {
            return redirect('admin/all/users')->with('flash_message', 'This action is invalid');
        }
        else {
             User::where('id', $id)->delete();
        }

        return redirect('admin/all/users')->with('flash_message', 'User Deleted successfully!');
    }


    /* 
    --------------------------------------------------
    Assign User Role
    --------------------------------------------------
    will assign the user as a Super-Admin
    Super-Admin has Many Permissions like delete users and Reports
    */

    // Change User Role To "super-admin"
    public function assignRoleSuperAdmin($id) {
        $users = User::where('id', $id)->get();
        if($id == 1){
            return redirect('admin/all/users')->with('flash_message', 'This action is invalid');
        }

        foreach($users as $user){
            $user->syncRoles('Admin');
        }
        return redirect('admin/all/users')->with('flash_message', 'User Role Updated successfully!');
    }

    // Change User Role To "admin"
    public function assignRoleAdmin($id) {
        $users = User::where('id', $id)->get();
        if($id == 1){
            return redirect('admin/all/users')->with('flash_message', 'This action is invalid');
        }
        foreach($users as $user){
            $user->syncRoles('Department');
        }
        return redirect('admin/all/users')->with('flash_message', 'User Role Updated successfully!');
    }

    // Change User Role To "user"
    public function assingRoleUser($id) {
        $users = User::where('id', $id)->get();
        if($id == 1){
            return redirect('admin/all/users')->with('flash_message', 'This action is invalid');
        }
        
        foreach($users as $user){
            $user->syncRoles('User');
        }
        return redirect('admin/all/users')->with('flash_message', 'User Role Updated successfully!');
    }

    /* 
    --------------------------------------------------
    Update Report Status Controller
    --------------------------------------------------
    */

    // Report Status Change to "Accepted" changed to acepted - before pending
    public function updateStatusPending($id){
        $report = Reports::where('id', $id)->first();
        $controller = new AdminController;

        if($report) {
            $report->status = 'Accepted';
            $report->save();
            session()->flash('flash_message','Report Status Updated Sucessfully - changed to Accepted');
            return $controller->viewReport($id);
        }

        session()->flash('flash_message','An error occurred while processing your request');
        return $controller->viewReport($id);
    }

    // Report Status Change to "Updated"
    public function updateStatusProcessing($id){
        $report = Reports::where('id', $id)->first();
        $controller = new AdminController;

        if($report) {
            $report->status = 'Processing';
            $report->save();

            session()->flash('flash_message','Report Status Updated Sucessfully - changed to Processing');
            return $controller->viewReport($id);
        }

        session()->flash('flash_message','An error occurred while processing your request');
        return $controller->viewReport($id);
    }

    // Report Status Change to "Rejected"
    public function updateStatusRejected($id){
        $report = Reports::where('id', $id)->first();
        $controller = new AdminController;

        if($report) {
            $report->status = 'Rejected';
            $report->save();

            session()->flash('flash_message','Report Status Updated Sucessfully - changed to Rejected');
            return $controller->viewReport($id);
        }

        session()->flash('flash_message','An error occurred while processing your request');
        return $controller->viewReport($id);
    }

    public function deleteIncident()
    {
        $incidents = ReportType::all();
        return view('admin.deleteIncidents')->with(['incidents' => $incidents]);
    }

    /* public function exportAsPDF()
    {
        $departments = Departments::all();

        foreach ($departments as $department) {
            $name[] = $department->department;
        }

        foreach($departments as $department){
            $assigns[] = FacadesDB::table('assigns')->where('department_id', $department->id)->get();
        }
        
        $now = Carbon::now();
        $startOfWeek = $now->startOfWeek()->format('Y-m-d H:i');
        $endOfWeek = $now->endOfWeek()->format('Y-m-d H:i');

        $reports = Reports::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        
        foreach($reports as $report){
            $i[] = $report->report_id;
        }
        
        $i = 0;
        foreach($assigns as $assign){
            
            $incidents[] = $reports->where('report_id', $assign[$i]->incidents_id)->count(); 
            $i+1;
            
        }
        
        $count = $incidents;

        $pdf = FacadePdf::loadView('pdf.reports', ['departments' => $name, 'count' => $count]);
        return $pdf->download('reports.pdf');
    } */

    public function exportAsPDF() 
    {
        // Get all departments and their names
        $departments = Departments::pluck('department')->toArray();

        // Get all assignments and their corresponding department IDs
        $assigns = AssignedDepartment::with('assignedTo')->get()->groupBy('department_id');

        // Get all reports created during the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $reports = Reports::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        // Count the number of incidents for each department
        $count = $assigns->map(function ($assignments) use ($reports) {
            $incidentIds = $assignments->pluck('incidents_id');
            return $reports->whereIn('report_id', $incidentIds)->count();
        })->toArray();

        // Get the image file
        $dclogo = public_path('images/don carlos logo.png');
        $imageData = base64_encode(file_get_contents($dclogo));
        $imageSrc1 = 'data:image/png;base64,' . $imageData;
        
        // Get the image file
        $ndrrmc = public_path('images/NDRRMC_logo.svg');
        $imageData = base64_encode(file_get_contents($ndrrmc));
        $imageSrc2 = 'data:image/png;base64,' . $imageData;

        $weekStart = \Carbon\Carbon::parse($startOfWeek)->format('F d, Y');
        $endWeek = \Carbon\Carbon::parse($endOfWeek)->format('F d, Y');
        
        // Generate and download the PDF report
        $pdf = FacadePdf::loadView('pdf.reports', compact('departments', 'count', 'imageSrc1', 'imageSrc2', 'weekStart', 'endWeek'));
        return $pdf->download('reportsDeprartments.pdf');
    }

    public function publishReport($id) 
    {
        $report = Reports::where('id', $id)->first();
        $location = FacadesDB::table('locations')->where('id', $report->location_id)->get();
        $incident = FacadesDB::table('report_types')->where('id', $report->report_id)->get();

        if (isNull($report->userId)) {
            $reporter = [];
        } else {
            $reporter = FacadesDB::table('users')->where('id', $report->userId)->get();
        }

        // dd($reporter);
        if($report->status == 'processing') {
            $report->status = 'Read';
            $report->save();
        }

        // Get the image file
        $dclogo = public_path('images/don carlos logo.png');
        $imageData = base64_encode(file_get_contents($dclogo));
        $imageSrc1 = 'data:image/png;base64,' . $imageData;
        
        // Get the image file
        $ndrrmc = public_path('images/NDRRMC_logo.svg');
        $imageData = base64_encode(file_get_contents($ndrrmc));
        $imageSrc2 = 'data:image/png;base64,' . $imageData;

        $createdAt = $report->created_at->format('d/m/Y');

        // Generate and download the PDF report
        $pdf = FacadePdf::loadView('pdf.individualReport', compact('report', 'location', 'incident', 'reporter', 'imageSrc1', 'imageSrc2', 'createdAt'));
        return $pdf->download('individualReport.pdf');
    }

    public function incidentsReportedPDF(){
        // Get all reports created during the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $reports = Reports::whereBetween('created_at', [$startOfWeek, $endOfWeek])->with('reports')->get();

        $weekStart = \Carbon\Carbon::parse($startOfWeek)->format('F d, Y');
        $endWeek = \Carbon\Carbon::parse($endOfWeek)->format('F d, Y');

        if($reports->isEmpty()){
            $reports = [];
            $incident = [];
            $count = [];
        }

        foreach($reports as $report){
            $incident[] = FacadesDB::table('report_types')->where('id', $report->report_id)->get();
        }

        $uniques = array_unique($incident);     // $votes = Vote::where('vote_type',1)->where('something',$something)->count();
      
        $i = 0;
        foreach($uniques as $unique){
            $count[] = $reports->where('report_id', $unique[$i]->id)->count();
            $i + 1;
        }

        $sum = array_sum($count);

        // Get the image file
        $dclogo = public_path('images/don carlos logo.png');
        $imageData = base64_encode(file_get_contents($dclogo));
        $imageSrc1 = 'data:image/png;base64,' . $imageData;
        
        // Get the image file
        $ndrrmc = public_path('images/NDRRMC_logo.svg');
        $imageData = base64_encode(file_get_contents($ndrrmc));
        $imageSrc2 = 'data:image/png;base64,' . $imageData;

        // Generate and download the PDF report
        $pdf = FacadePdf::loadView('pdf.incidents', compact('weekStart', 'endWeek','imageSrc1', 'imageSrc2', 'reports', 'incident', 'count'));
        return $pdf->download('incidents.pdf');
    }
}