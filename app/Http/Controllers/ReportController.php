<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public  function showReport(){

        $reports = Report::latest()->get();

        return view('crime_report',compact('reports'));
    }

    public function viewReport($id)
    {
        $reports = Report::find($id);
        return view('report.view_report', compact('reports'));
    }

    public function editReport($id)
    {
        $reports = Report::find($id);
        return view('report.edit_report', compact('reports'));
    }

    public function updateReport(Request $request, $id)
    {
        $reports = Report::find($id);
        $reports->report_by = $request->input('report_by');
        $reports->report_date = $request->input('report_date');
        $reports->incident_type = $request->input('incident_type');
        $reports->date_incident = $request->input('date_incident');
        $reports->province = $request->input('province');
        $reports->incident_location = $request->input('incident_location');
        $reports->incident_description = $request->input('incident_description');
        $reports->lat = $request->input('lat');
        $reports->long = $request->input('long');
        $reports->report_status = $request->input('report_status');
        $reports->report_image = $request->input('report_image');
        $reports->report_video = $request->input('report_video');
        $reports->save();
        return redirect()->route('report')->with('success', 'Report updated successfully.');
    }
    public function deleteReport($id)
    {
        $reports = Report::find($id);
        $reports->delete();
        return redirect()->route('report')->with('success', 'Report deleted successfully.');
    }
}
