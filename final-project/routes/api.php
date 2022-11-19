<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;

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

// Route get-all-resource-patients
Route::get('/patients', [PatientsController::class, 'index']);

// Route add-resource-patients
Route::post('/patients', [PatientsController::class, 'store']);

// // Route get-detail-resource-patients
Route::get('/patients/{id}', [PatientsController::class, 'show']);

// // Route edit-patients
Route::put('/patients/{id}', [PatientsController::class,  'update']);

// // Route delete-patients
Route::delete('/patients/{id}', [PatientsController::class, 'destroy']);

// // Route search-patients-by-name 
Route::get('/patients/search/{name}', [PatientsController::class, 'search']);

// // Route get-positive-patients
Route::get('/patients/search/positive', [PatientsController::class, 'positive'] );

// // Route recovered-patients
Route::get('/patients/search/recovered', [PatientsController::class, 'recovered']);

// // Route dead-patients
Route::get('/patients/search/dead', [PatientsController::class,  'dead']);



