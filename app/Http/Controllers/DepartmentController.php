<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $response;

    public function __construct()
    {
        $this->response = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();

        $departsNum = $departments->count();

        if ($departsNum == 0) {
            return $this->response->__invoke(
                false,
                "No departments were found, please add one.",
                404,
                null
            );
        };

        return $this->response->__invoke(
            true,
            "Departments were retrieved",
            200,
            $departments,
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $departs = Department::all();

        return $this->response->__invoke(
            true, "Departments were retrieved.", 200, $departs
        );
    }

    /**
     * Create departments
     */
    public function create(Request $request)
    {
        $department = Department::create($request->all());

        return $this->response->__invoke(
            true,
            "Department was created successfully.",
            201,
            $department
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
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $departId)
    {
        $depart = Department::find($departId);

        $depart->delete();

        return $this->response->__invoke(
            true,
            "Department was deleted!",
            201,
            null
        );
    }
}
