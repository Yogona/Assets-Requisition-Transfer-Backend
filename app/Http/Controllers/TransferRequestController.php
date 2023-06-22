<?php

namespace App\Http\Controllers;

use App\Models\TransferRequest;
use Illuminate\Http\Request;

class TransferRequestController extends Controller
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
        $transferRequests = TransferRequest::paginate($records);

        $transferRequestsNum = $transferRequests->count();
        if($transferRequestsNum == 0) {
            return $this->res->__invoke(
                false,
                "No assets transfer requests.",
                404
            );
        }

        return $this->res->__invoke(
            true,
            "Assets were retrieved.",
            200,
            $transferRequests
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(TransferRequest $transferRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransferRequest $transferRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransferRequest $transferRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransferRequest $transferRequest)
    {
        //
    }
}
