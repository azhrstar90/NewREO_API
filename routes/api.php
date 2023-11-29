<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\TransactionsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Start Object Routs
Route::prefix('Agancy')->group(function () {
    Route::apiResource('Objects', ObjectsController::class);
    Route::get('ObjecsFilter', [ObjectsController::class, 'Object_filter']);
});
// End Object Routs


//Client Routs
Route::prefix('Agancy')->group(function () {
    Route::apiResource('Clients', ClientsController::class);
});
// End Object Routs


//Client Routs
Route::prefix('Agancy')->group(function () {
    Route::apiResource('Transactions', TransactionsController::class);
});
// End Object Routs
