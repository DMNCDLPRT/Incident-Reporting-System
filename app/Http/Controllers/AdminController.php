<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Reports::latest()->get();
        return view ('admin.adminDashboard  ')->with('reports', $reports);
    }

    public function report()
    {
        $report = Reports::latest()->get();
        return view ('admin.adminReport')->with('report', $report);
    }
}