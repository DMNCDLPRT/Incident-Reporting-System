<?php

namespace App\Http\Controllers;

use App\Http\Livewire\AssignDepartments;
use App\Models\AssignDepartment;
use App\Models\AssignedDepartment;
use App\Models\cellNumber;
use App\Models\Departments;
use App\Models\Reports;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Support\Facades\DB as FacadesDB;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{
    public function index() 
    {
        $reports = Reports::with('reports', 'locations')->latest()->get();
        if($reports->isEmpty()) {
            $location = [];
            $incidents = [];
            return view ('admin.adminDashboard')->with(['reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
        }

        foreach($reports as $report){
            $location[] = FacadesDB::table('locations')->where('id', $report->location_id)->latest()->get();
        }

        foreach($reports as $report){
            $incidents[] = FacadesDB::table('report_types')->where('id', $report->id)->latest()->get();
        }

        return view ('admin.adminDashboard')->with(['reports' => $reports, 'location' => $location, 'incidents' => $incidents]);
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
        cellNumber::destroy($id);
        return redirect('admin/admin')->with('flash_message', 'Post deleted successfully!');
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
        $assigns = ['assign'];
        $numbers = cellNumber::find($id);
        $assigns = FacadesDB::table('assigns')->where('department_id', $id)->get();

        if($assigns->isEmpty()){
            $incidents = [];
            return view('admin.viewDepartment')->with(['numbers' => $numbers, 'incidents' => $incidents]);  
        }

        foreach($assigns as $assign){
            $incidents[] = FacadesDB::table('report_types')->where('id', $assign->incidents_id)->get(); 
        }

        return view('admin.viewDepartment')->with(['numbers' => $numbers, 'incidents' => $incidents]);  
    }

    // delete report - Route::middleware(rele:super-admin)->...
    public function destroyReport($id)
    {
        Reports::destroy($id);
        return redirect('admin/dashboard')->with('flash_message', 'Post Deleted successfully!');
    }

    public function viewReport($id)
    {
        $report = Reports::where('id', $id)->first();
        // dd($report);
        $location = FacadesDB::table('locations')->where('id', $report->location_id)->get();
        $incident = FacadesDB::table('report_types')->where('id', $report->report_id)->get();
        $reporter = FacadesDB::table('users')->where('id', $report->userId)->get();

        // dd($reporter);

        if($report->status == 'processing') {
            $report->status = 'Read';
            $report->save();
        }

        return view('admin.viewReport')->with(['report' => $report, 'location' => $location, 'incident' => $incident, 'reporter' => $reporter]);
    }

    public function users() {
        $users = User::all();

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
            return redirect('admin\UsersRoles')->with('flash_message', 'This action is invalid');
        }
        else {
            $user = User::where('id', $id)->get();
            $user->destroy();
        }

        return redirect('admin\UsersRoles')->with('flash_message', 'User Deleted successfully!');
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
            $user->syncRoles('super-admin');
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
            $user->syncRoles('admin');
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
            $user->syncRoles('user');
        }
        return redirect('admin/all/users')->with('flash_message', 'User Role Updated successfully!');
    }



    /* 
    --------------------------------------------------
    Update Report Status Controller
    --------------------------------------------------
    */

    // Report Status Change to "Pending"
    public function updateStatusPending($id){
        $report = Reports::where('id', $id)->first();
        $controller = new AdminController;

        if($report) {
            $report->status = 'Pending';
            $report->save();
            session()->flash('flash_message','Report Status Updated Sucessfully - changed to Pending');
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
}