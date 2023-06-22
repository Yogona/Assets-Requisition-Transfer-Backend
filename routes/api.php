<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\IssueNoteController;
use App\Http\Controllers\NoteItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::post("login", "login");
});

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/user', function (Request $request) {
            $user = $request->user();
            $user->role = Role::find($user->role);
            return $user;
        });
        Route::post("logout", "logout");
    });

    //Roles
    Route::controller(RoleController::class)->prefix('roles')->group(function(){
        Route::get('', 'index');
    });

    //Departments
    Route::controller(DepartmentController::class)->prefix('departs')->group(function(){
        Route::post('create', 'create');
        Route::delete("delete/{depart_id}", "destroy");
        Route::get('list', 'list');
        Route::get('', 'index');
    });

    //Users
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::post('create', 'create');
        Route::post('upload', 'uploadUsers');
        Route::patch("update/{user_id}", "updateProfile");
        Route::delete("delete/{user_id}", "destroy");
        Route::get("role/{type}/records/{records}", "index");
        Route::get("role/{type}/search/{query}/records/{records}", "searchIndex");
    });

    //Stores
    Route::controller(StoreController::class)->prefix("stores")->group(function () {
        Route::post("create", "store");
        Route::get("{records}", "index");
        Route::get("", "list");
        Route::get("search/{query}", "searchList");
        Route::put("update/{store_id}", "update");
    });

    //Issue notes
    Route::controller(IssueNoteController::class)->prefix('issue-notes')->group(function(){
        Route::post('', 'create');
        Route::get('/records/{records}', 'index');
        Route::patch('sign', 'sign');
    });

    Route::get("counter", [CounterController::class, "__invoke"]);

    //Note instruments
    Route::controller(NoteItemController::class)->prefix("instruments/note/{note_code}")->group(function(){
        Route::get("records/{records}", "index");
        Route::post("register", "registerByRequesition");
    });

    //Instruments
    // Route::controller(InstrumentController::class)->prefix("instruments")->group(function(){
        
    // });
});

Route::fallback(function () {
    return response()->json([
        "success"   => false,
        "message"   => "Redource does not exist.",
        "data"      => null
    ], 404);
});