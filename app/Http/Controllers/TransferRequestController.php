<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\TransferRequest;
use App\Models\TransferRequestAssets;
use App\Models\User;
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

        foreach($transferRequests as $transferRequest){
            $fromDepartment = Department::find($transferRequest->from_department);
            $transferRequest->from_department = $fromDepartment;

            $toDepartment = Department::find($transferRequest->to_department);
            $transferRequest->to_department = $toDepartment;

            $fromHOD = User::find($transferRequest->release_sign);
            $transferRequest->release_sign = $fromHOD;

            $toHOD = User::find($transferRequest->acceptance_sign);
            $transferRequest->acceptance_sign = $toHOD;

            $custodian = User::find($transferRequest->approval_sign);
            $transferRequest->approval_sign = $custodian;
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
    public function create(Request $request)
    {
        $transferRequest = TransferRequest::create([
            "from_department"   => $request->fromDepartment,
            "to_department"     => $request->toDepartment,
        ]);

        foreach($request->assets as $asset){
            TransferRequestAssets::create([
                "department_asset"  => $asset["asset"]["id"],
                "quantity"          => $asset["quantity"],
                "transfer_request"  => $transferRequest->id
            ]);
        }

        return $this->res->__invoke(
            true, "Transfer request was placed.", 201
        );
    }

    /**
     * Signs the assets transfer requests
     */
    public function sign(Request $request)
    {
        $user = $request->user();

        $transferRequest = TransferRequest::find($request->transferId);

        if($user->role == 2 && $user->department == $transferRequest->from_department){
            $transferRequest->update(["release_sign" => $user->id]);
        } else if($user->role == 2 && $user->department == $transferRequest->to_department){
            $transferRequest->update(["acceptance_sign" => $user->id]);
        } else if($user->role == 4){
            $transferRequest->update(["approval_sign" => $user->id]);
        } else {
            return $this->res->__invoke(
                false,
                "Only HOD and asset custodian can sign.",
                403
            );
        }

        if($transferRequest->release_sign && $transferRequest->acceptance_sign && $transferRequest->approval_sign){
            
        }

        return $this->res->__invoke(
            true, "You signed successfully.", 200
        );
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
