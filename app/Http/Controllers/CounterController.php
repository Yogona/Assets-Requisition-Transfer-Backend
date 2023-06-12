<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;

class CounterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::all()->count();
        $departs = Department::all()->count();
        $stores = Store::all()->count();

        return response()->json([
            "users" => $users, "departs" => $departs, "stores" => $stores
        ]);
    }
}
