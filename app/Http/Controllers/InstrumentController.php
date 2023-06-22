<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentsInstruments;
use App\Models\Instrument;
use App\Models\IssueNoteItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstrumentController extends Controller
{
    private $res;

    public function __construct()
    {
        $this->res = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $records)
    {
        $user = $request->user();

        if($user->role == 1){
            $departmentAssets = DepartmentsInstruments::orderBy("id", "DESC")->paginate($records);
        }else{
            $departmentAssets = DepartmentsInstruments::where("department", $user->department)->paginate($records);
        }

        $assetsNum = $departmentAssets->count();
        if ($assetsNum == 0) {
            return $this->res->__invoke(
                false,
                "Assets not found.",
                404
            );
        }

        foreach($departmentAssets as $departmentAsset){
            $asset = Instrument::where("instrument_code", $departmentAsset->instrument)->first();
            $departmentAsset->instrument = $asset;

            $department = Department::find($departmentAsset->department);
            $departmentAsset->department = $department;
        }

        return $this->res->__invoke(
            true,
            "Assets were retrieved.",
            200,
            $departmentAssets
        );
    }

    /**
     * Department assets
     */
    public function listAssets(Request $request, $department)
    {
        $departmentAssets = DepartmentsInstruments::where("department", $department)->get();
        
        if($departmentAssets->count() == 0){
            return $this->res->__invoke(
                false,
                "Assets not found.",
                404
            );
        }

        foreach ($departmentAssets as $departmentAsset) {
            $asset = Instrument::where("instrument_code", $departmentAsset->instrument)->first();
            $departmentAsset->instrument = $asset;

            $department = Department::find($departmentAsset->department);
            $departmentAsset->department = $department;
        }

        return $this->res->__invoke(
            true,
            "Assets were retrieved.",
            200,
            $departmentAssets
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Instrument $instrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrument $instrument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrument $instrument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrument $instrument)
    {
        //
    }
}
