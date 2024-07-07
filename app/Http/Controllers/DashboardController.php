<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function TotalReports()
    {
        $totalReports = Report::all()->count();
        $newCrimeReports = Report::where('report_status', 'pending')->count();
        $completeCrimeReports = Report::where('report_status', 'completed')->count();
        $ongoingCrimeReports = Report::where('report_status', 'progress')->count();

        $reports = Report::select('incident_type', DB::raw('count(*) as count'))
            ->groupBy('incident_type')
            ->get();

        return view('dashboard', compact(
            'totalReports',
            'newCrimeReports',
            'completeCrimeReports',
            'ongoingCrimeReports',
            'reports'
        ));
    }

    //     public function searchReports(Request $request)
    //     {
    //         $startDate = $request->input('start_date');
    //         $endDate = $request->input('end_date');
    //         $reports = Report::whereBetween('date_incident', [$startDate, $endDate])->get();

    //         // Pass $reports to the view
    //         return view('dashboard', compact('reports'));
    //     }
}
