<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($success, $message, $statusCode, $data = null)
    {
        return response()->json([
            "success" => $success, "message" => $message, "data" => $data
        ], $statusCode);
    }
}
