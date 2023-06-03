<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $response;

    public function __construct()
    {
        $this->response = new ResponseController();
    }

    private function handleSession(Request $request)
    {
        $request->session()->regenerate();
        $user = $request->user();

        return $this->response->__invoke(true, "Signed in!", 202, $user);
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(["username" => $username, "password" => $password,])) {
            return $this->handleSession($request);
        } else if (Auth::attempt(["email" => $username, "password" => $password,])) {
            return $this->handleSession($request);
        } else if (Auth::attempt(["phone" => $username, "password" => $password,])) {
            return $this->handleSession($request);
        }

        return $this->response->__invoke(false, "Incorrect username or password", 401);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return $this->response->__invoke(
            true,
            "You logged out successfully.",
            200
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
