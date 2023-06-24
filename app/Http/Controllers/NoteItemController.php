<?php

namespace App\Http\Controllers;

use App\Models\IssueNote;
use App\Models\IssueNoteItem;
use App\Models\Instrument;
use App\Models\DepartmentsInstruments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class NoteItemController extends Controller
{
    private $res;

    public function __construct()
    {
        $this->res = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $noteId, $records)
    {
        $noteInstruments = IssueNoteItem::where("issue_note", $noteId)->paginate($records);

        $noteInstrumentsNum = $noteInstruments->count();
        if($noteInstrumentsNum == 0){
            return $this->res->__invoke(
                false,
                "Note assets not found.",
                404
            );
        }

        return $this->res->__invoke(
            true,
            "Note instruments were retrieved.",
            200,
            $noteInstruments
        );
    }

    /**
     * Registers assets from requisition note
     */
    public function registerByRequesition(Request $request, $noteCode, $itemCode)
    {
        try {
            DB::beginTransaction();
            $issueNoteItem = IssueNoteItem::where("item_code", $itemCode)->first();
    
            $issueNoteItem->update([
                "supplied"      => $issueNoteItem->requested,
                "registered"    => true
            ]);

            $issueNote  = $issueNoteItem->issueNote()->first();
            $department = $issueNote->department()->first();

            $instrument = Instrument::create([
                "instrument_code"   => "ARU/$department->department_number/$department->building_number/$issueNoteItem->item_description/".time(),
                "description"       => $issueNoteItem->item_description,
                "unit"              => $issueNoteItem->issue_unit
            ]);

            DepartmentsInstruments::create([
                "instrument"    => $instrument->instrument_code,
                "quantity"      => $issueNoteItem->supplied,
                "department"    => $issueNote->department
            ]);

            DB::commit();
        } catch (QueryException $exc) {
            DB::rollBack();
            return $this->res->__invoke(
                true,
                $exc, //"Internal server error.",
                500
            );
        }

        return $this->res->__invoke(
            true,
            "Asset has been registered and recorded to the department.",
            201
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
    public function show(IssueNoteItem $issueNoteItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IssueNoteItem $issueNoteItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IssueNoteItem $issueNoteItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IssueNoteItem $issueNoteItem)
    {
        //
    }
}
