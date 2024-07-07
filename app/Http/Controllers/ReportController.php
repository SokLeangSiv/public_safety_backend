<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function ShowForm()
    {
        $reports = Report::paginate(10);
        return view('report.crime_form', compact('reports'));
    }

    public function findDate(Request $request)
    {

        $start_date = request('start_date');
        $end_date = request('end_date');
        $query = Report::query();

        if ($start_date && $end_date) {
            $query->whereBetween('report_date', [$start_date, $end_date])
                ->orWhereBetween('date_incident', [$start_date, $end_date]);
        }

        $reports = $query->paginate(10);


        return view('crime_report', compact('reports'));
    }

    public function storeReport(Request $request)
    {
        $report = new Report();

        $report->report_by = $request->input('report_by');
        $report->report_date = $request->input('report_date');

        $incidentType = $request->input('incident_type');

        if ($incidentType == 'other') {
            $incidentType = $request->input('other_crime_description');
        }
        $report->incident_type = $incidentType;
        $report->date_incident = $request->input('date_incident');
        $report->province = $request->input('province');
        $report->incident_location = $request->input('incident_location');
        $report->incident_description = $request->input('incident_description');
        $report->lat = $request->input('lat');
        $report->long = $request->input('long');
        $report->report_status = $request->input('report_status');



        if($request->has('report_image')){
            $images = $request->file('report_image');
            foreach($images as $image){
                $extension = $image->getClientOriginalExtension();
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if(in_array($extension, $allowedExtensions)){
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('public/report_image'), $image_name);
                    $report->report_image .= $image_name . ',';
                }
            }
            $report->report_image = rtrim($report->report_image, ',');
        }






        $report->save();

        return redirect()->route('report')->with('success', 'Report created successfully!');
    }

    public function showNewReport()
    {
        $Newreports = Report::where('report_status', 'pending')->paginate(10);
        return view('report.new_report', compact('Newreports'));
    }

    public function showCompleteReport()
    {
        $Completreports = Report::where('report_status', 'completed')->paginate(10);
        return view('report.completed_crime', compact('Completreports'));
    }

    public function showOngoingReport()
    {
        $Ongoingreports = Report::where('report_status', 'progress')->paginate(10);
        return view('report.progress_crime', compact('Ongoingreports'));
    }

    public function showReport()
    {
        $reports = Report::latest()->paginate(10);
        return view('crime_report', compact('reports'));
    }

    public function viewReport($id)
    {
        $reports = Report::find($id);
        $location = Report::select('lat', 'long')->where('id', $id)->first();


        return view('report.view_report', compact('reports', 'location'));

    }

    public function editReport($id)
    {
        $reports = Report::find($id);
        $location = Report::select('lat', 'long')->where('id', $id)->first();
        return view('report.edit_report', compact('reports', 'location'));
    }

    public function updateReport(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $report->report_by = $request->input('report_by');
        $report->report_date = $request->input('report_date');

        if ($request->input('incident_type') === 'Other') {
            $report->incident_type = $request->input('incident_type_other');
        } else {
            $report->incident_type = $request->input('incident_type');
        }

        $report->date_incident = $request->input('date_incident');
        $report->province = $request->input('province');
        $report->incident_location = $request->input('incident_location');
        $report->incident_description = $request->input('incident_description');
        $report->lat = $request->input('lat');
        $report->long = $request->input('long');
        $report->report_status = $request->input('report_status');

        // if ($request->hasFile('report_image')) {
        //     $file = $request->file('report_image');
        //     $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('public/report_image'), $fileName);
        //     $report->report_image = $fileName;
        // } elseif ($request->has('remove_image')) {
        //     if ($report->report_image && file_exists(public_path($report->report_image))) {
        //         unlink(public_path($report->report_image));
        //     }
        //     $report->report_image = null;
        // }


    // Delete old images
    if ($report->report_image) {
        $oldImages = explode(',', $report->report_image);
        foreach ($oldImages as $oldImage) {
            $oldImagePath = public_path('public/report_image/' . $oldImage);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);  // delete the old image
            }
        }
    }

    // Initialize an empty string for new images
    $report->report_image = '';

    // Upload new images and save their names
    if ($request->has('report_image')) {
        $images = $request->file('report_image');
        foreach ($images as $image) {
            $extension = $image->getClientOriginalExtension();
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($extension, $allowedExtensions)) {
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('public/report_image'), $image_name);
                $report->report_image .= $image_name . ',';
            }
        }
        $report->report_image = rtrim($report->report_image, ',');
    }

        $report->save();

        return redirect()->route('report')->with('success', 'Report updated successfully!');
    }

    public function deleteReport($id)
    {
        $reports = Report::find($id);
        $reports->delete();
        return redirect()->route('report')->with('success', 'Report deleted successfully.');
    }

    public function showMap()
    {
        return view('map');
    }

    public function showReportsByProvince($province)
    {
        $provinceMapping = [
            'banteaymeanchey' => 'Banteay Meanchey',
            'battambang' => 'Battambang',
            'kampongcham' => 'Kampong Cham',
            'kampongchhnang' => 'Kampong Chhnang',
            'kampongspeu' => 'Kampong Speu',
            'kampongthom' => 'Kampong Thom',
            'kampot' => 'Kampot',
            'kandal' => 'Kandal',
            'kohkong' => 'Koh Kong',
            'kratie' => 'Kratié',
            'mondulkiri' => 'Mondulkiri',
            'oddarmeanchey' => 'Oddar Meanchey',
            'pailin' => 'Pailin',
            'preahsiemreap' => 'Preah Sihanouk',
            'preahvihear' => 'Preah Vihear',
            'pursat' => 'Pursat',
            'ratanakiri' => 'Ratanakiri',
            'siemreap' => 'Siem Reap',
            'stungtreng' => 'Stung Treng',
            'svayrieng' => 'Svay Rieng',
            'takeo' => 'Takeo',
            'tbongkhmum' => 'Tbong Khmum',
            'phnompenh' => 'Phnom Penh',
            'preyveng' => 'Prey Veng',
            'krongkep' => 'Krong Kep',
        ];

        $normalizedProvince = strtolower(str_replace([' ', '-'], '', $province));
        $standardizedProvince = $provinceMapping[$normalizedProvince] ?? $province;

        $reports = Report::whereRaw('LOWER(province) = ?', [strtolower($standardizedProvince)])->paginate(10);
        return view('report.show_province', compact('reports', 'province'));
    }

    public function searchReports(Request $request)
    {
        $search = $request->search;
        $reports = Report::where('incident_type', 'like', '%' . $search . '%')
            ->orWhere('province', 'like', '%' . $search . '%')
            ->orWhere('incident_location', 'like', '%' . $search . '%')
            ->orWhere('report_by', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('crime_report', compact('reports', 'search'));
    }
}
