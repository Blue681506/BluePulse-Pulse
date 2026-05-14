<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        $totalReports = Report::count();

        $pendingReports = Report::where('status', 'pending')->count();

        $processReports = Report::where('status', 'process')->count();

        $doneReports = Report::where('status', 'done')->count();

        return view('admin.dashboard', compact(
            'totalReports',
            'pendingReports',
            'processReports',
            'doneReports'
        ));
    }
}