<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Packages\SimpleXLSX;
use App\Models\Role;
use App\Models\Department;

class UserController extends Controller
{
    private $response;

    public function __construct()
    {
        $this->response = new ResponseController();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $type, $records)
    {
        $user = $request->user();

        if ($user->role == 1) {
            if ($type == "all") {
                $users = User::paginate($records);
            } else {
                $users = User::where("role", $type)->paginate($records);
            }

            foreach ($users as $user) {
                $role = Role::find($user->role);
                $user->role = $role;
                $depart = Department::find($user->department);
                $user->department = $depart;
            }
        } else {
            return $this->response->__invoke(
                false,
                "Not authorized to view users.",
                403,
                null
            );
        }

        $usersNum = $users->count();
        if ($usersNum == 0) {
            return $this->response->__invoke(
                false,
                "No users were found.",
                404,
                null
            );
        }

        return $this->response->__invoke(
            true,
            "User" . (($usersNum > 1) ? "s were" : " was") . " retrieved successfully.",
            200,
            $users
        );
    }

    /**
     * Creates a new user
     */
    public function create(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password' => Hash::make($user->email)]);

        return $this->response->__invoke(
            true, "User was created.", 201, $user
        );
    }

    private function validateUsers($rows)
    {
        $extractedRecords = array();

        $heads = $rows[0];
        //index 0 is heads
        $index = 0;
        foreach ($rows as $row) {
            //We skip because it is heads
            if ($index == 0) {
                ++$index;
                continue;
            }

            $firstName  = $row[0];
            $lastName   = $row[1];
            $username   = $row[2];
            $gender     = $row[3];
            $email      = $row[4];
            $phone      = $row[5];
            $roleId     = $row[6];
            $departId   = $row[7];

            $validation = Validator::make(
                array(
                    $heads[0] => $firstName,
                    $heads[1] => $lastName,
                    $heads[2] => $username,
                    $heads[3] => $gender,
                    $heads[4] => $email,
                    $heads[5] => $phone,
                    $heads[6] => $roleId
                ),
                [
                    $heads[0] => "required", //First name
                    $heads[1] => "required", //Last name
                    $heads[2] => "required", //User id
                    $heads[3] => "required", //Gender
                    $heads[4] => "required|unique:users|email", //Email
                    $heads[5] => "required|min:10|max:13", //Phone
                    $heads[6] => "required|integer|gte:1|lte:5"
                ]
            );

            if ($validation->fails()) {
                //We increment to get actual row number
                ++$index;
                return array("hasErrors" => true, "index" => $index, "errors" => $validation->errors());
            }

            array_push($extractedRecords, [
                "firstName" => $firstName,
                "lastName"  => $lastName,
                "username"  => $username,
                "gender"    => $gender,
                "email"     => $email,
                "phone"     => $phone,
                "roleId"    => $roleId,
                "departId"  => $departId
            ]);
            ++$index;
        }

        return array("hasErrors" => false, "data" => $extractedRecords);
    }

    public function uploadUsers(Request $request)
    {
        // if ($request->user()->cannot("create-user")) {
        //     return $this->response->__invoke(
        //         false,
        //         "Unauthorized to upload users.",
        //         null,
        //         403
        //     );
        // }

        $contactsFile = $request->file('users');
        $ext = $contactsFile->getClientOriginalExtension();

        if ($ext != "xls" && $ext != "xlsx") {
            return $this->response->__invoke(false, "File format is not supported, only xlsx or xls is accepted.", 422);
        }

        $xlsx = new SimpleXLSX($contactsFile);
        $records = $xlsx->rows();

        $results = $this->validateUsers($records);

        if ($results["hasErrors"]) {
            return $this->response->__invoke(false, "Check input(s) at row {$results['index']}.", 422, $results['errors']);
        }

        foreach ($results["data"] as $record) {
            User::create([
                "first_name"    => $record["firstName"],
                "last_name"     => $record["lastName"],
                "username"      => $record["username"],
                "gender"        => $record["gender"],
                "email"         => $record["email"],
                "phone"         => $record["phone"],
                "role"          => $record["roleId"],
                "department"    => $record["departId"],
                "password"      => Hash::make($record["email"])
            ]);
        }

        // UploadUsers::dispatch($results["data"], $request->user());

        return $this->response->__invoke(
            true, 
            "Users data were validated successfully, they will continue uploading in the background. We will let you know once the process is complete!.", 
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function updateProfile(Request $request, $userId)
    {
        $user = User::find($userId);

        $user->update([
            "first_name"    => $request->first_name,
            "last_name"     => $request->last_name,
            "gender"        => $request->gender,
            "role"          => $request->role,
            "department"        => $request->depart
        ]);

        return $this->response->__invoke(
            true,
            "Profile was updated!",
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $userId)
    {
        $user = User::find($userId);

        $user->delete();

        return $this->response->__invoke(
            true,
            "User was deleted!",
            200
        );
    }
}
