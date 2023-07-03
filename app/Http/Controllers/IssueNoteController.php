<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\IssueNote;
use App\Models\IssueNoteItem;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class IssueNoteController extends Controller
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
        $issueNotes = null;

        if($user->role == 2 || $user->role == 3 || $user->role == 5){ //HOD , HPMU or Supplies officer
            $issueNotes = IssueNote::where("department", $user->department);
        }
        else if($user->role == 8){
            $issueNotes = IssueNote::orderBy("created_at", "DESC");
        }
        else{
            $issueNotes = IssueNote::where("requester", $user->id)->orderBy("created_at", "DESC");
        }

        $notesNum = $issueNotes->count();
        if($notesNum == 0){
            return $this->res->__invoke(
                false, "No requisition issue notes.", 404
            );
        }

        $issueNotes = $issueNotes->paginate($records);

        foreach($issueNotes as $issueNote){
            $department = Department::find($issueNote->department);
            $issueNote->department = $department;

            $store = Store::find($issueNote->store);
            $issueNote->store = $store;

            $requester = User::find($issueNote->requester);
            $issueNote->requester = $requester;

            $hod = User::find($issueNote->hod_signature);
            $issueNote->hod_signature = $hod;

            $storeOfficer = User::find($issueNote->store_officer_signature);
            $issueNote->store_officer_signature = $storeOfficer;
        }

        return $this->res->__invoke(
            true, "Issues notes were retrieved.", 200, $issueNotes
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = $request->user();

        $timestamp = time();
        $noteCode = "IN$timestamp";

        $issueNote = IssueNote::create([
            "note_code"     => $noteCode,
            "department"    => ($user->role == 1)? $request->department:$user->department,
            // "store"         => $request->store,
            "requester"     => $user->id
        ]);

        foreach($request->items as $item){
            $timestamp = time();
            $itemCode = "IC$timestamp";
            IssueNoteItem::create([
                "item_code"         => $itemCode,
                "issue_note"        => $noteCode,
                "item_description"  => $item["description"],
                "issue_unit"        => $item["unit"],
                "requested"         => $item["quantity"],
            ]);
        }

        return $this->res->__invoke(
            true, "Issue Note was submitted successfully.", 201, $issueNote
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
    public function show(IssueNote $issueNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function sign(Request $request)
    {
        $user = $request->user();
        $issueNote = IssueNote::where("note_code", $request->note_code);

        if($user->role == 2 || $user->role == 3 || $user->role == 5){
            $issueNote->update([
                "hod_signature" => $user->id
            ]);
        } else if($user->role == 8){
            $issueNote->update([
                "store_officer_signature" => $user->id
            ]);
        }else{
            return $this->res->__invoke(
                false,
                "You can't sign",
                403
            );
        }

        return $this->res->__invoke(
            true, "You signed requisition issue note.", 200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IssueNote $issueNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IssueNote $issueNote)
    {
        //
    }
}
