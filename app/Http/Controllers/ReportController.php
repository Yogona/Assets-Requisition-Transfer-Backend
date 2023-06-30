<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentsInstruments;
use App\Models\Instrument;
use App\Models\Report;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getReports($from, $to)
    {
        $departmentInstruments = DepartmentsInstruments::where("created_at", ">=", $from)
        ->where("created_at", "<=", $to)->get();

        foreach ($departmentInstruments as $departmentInstrument) {
            // $instrument = Instrument::where("instrument", $departmentInstrument->instrument)->first();
            // $departmentInstrument->instrument = $instrument;

            // $department = Department::find($departmentInstrument->department);
            // $departmentInstrument->department = $department;
        }

        return $departmentInstruments;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $from, $to)
    {
        $pdf = PDF::loadView("report", $this->getReports($from, $to));

        return $pdf->download("report.pdf");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $from, $to)
    {
        return view("report", ["instruments" => $this->getReports($from, $to)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
