<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Reports::latest()->get();
        return view ('admin.adminDashboard  ')->with('reports', $reports);
    }

    public function report()
    {
        $report = Reports::latest()->take(20)->get();
        
        $users = User::get($report->userId)->get();

        dd($users);
        return view ('admin.adminReport')->with('report', $report);
    }
}