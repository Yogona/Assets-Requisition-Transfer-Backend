<?php

namespace App\Http\Controllers;

use App\Models\DepartmentsInstruments;
use App\Models\TransferRequestAssets;
use App\Models\Instrument;
use Illuminate\Http\Request;

class TransferRequestAssetsController extends Controller
{
    private $res;

    public function __construct()
    {
        $this->res = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $requestId, $records)
    {
        $transferRequestAssets = TransferRequestAssets::where("transfer_request", $requestId);

        $transferRequestAssetsNum = $transferRequestAssets->count();
        if ($transferRequestAssetsNum == 0) {
            return $this->res->__invoke(
                false,
                "No transfer requests assets.",
                404
            );
        }

        $transferRequestAssets = $transferRequestAssets->paginate($records);

        foreach($transferRequestAssets as $transferRequestAsset){
            $departmentAsset = DepartmentsInstruments::find($transferRequestAsset->department_asset);
            $transferRequestAsset->department_asset = $departmentAsset;

            $asset = Instrument::where("instrument_code", $transferRequestAsset->department_asset->instrument)->first();
            $transferRequestAsset->department_asset->instrument = $asset;
        }

        return $this->res->__invoke(
            true, "Transfer request assets were retrieved.", 200,
            $transferRequestAssets
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show(TransferRequestAssets $transferRequestAssets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransferRequestAssets $transferRequestAssets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransferRequestAssets $transferRequestAssets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransferRequestAssets $transferRequestAssets)
    {
        //
    }
}
