<?php

namespace App\Http\Controllers;

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
            $assets = DepartmentsInstruments::orderBy("id", "DESC")->paginate($records);
        }else{
            $assets = DepartmentsInstruments::where("department", $user->department)->paginate($records);
        }

        $assetsNum = $assets->count();
        if ($assetsNum == 0) {
            return $this->res->__invoke(
                false,
                "Assets not found.",
                404
            );
        }

        return $this->res->__invoke(
            true,
            "Assets were retrieved.",
            200,
            $assets
        );
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
