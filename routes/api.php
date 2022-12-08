<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users'], function ($router) {
    Route::get('getDepartments', [sharedFunctionsController::class, 'getDepartments']);
    Route::post('createUser', [UserController::class, 'createUser']);
    Route::get('getUsers', [UserController::class, 'getUsers']);
    Route::post('login', [UserController::class, 'login']);
});

Route::group(['prefix' => 'events'], function ($router) {
    Route::post('setStatusReserve', [ReservaController::class, 'setStatusReserve']);
    Route::get('getAllReserve', [ReservaController::class, 'getAllReserve']);
    Route::post('addReserve', [ReservaController::class, 'addReserve']);
    Route::post('getReserve', [ReservaController::class, 'getReserve']);
    Route::get('getEvents', [EventController::class, 'getEvents']);
    Route::post('addEvent', [EventController::class, 'addEvent']);
    Route::post('deleteEvent', [EventController::class, 'deleteEvent']);
});
