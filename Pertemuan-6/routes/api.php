<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentsController;


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

 # Method GET

 Route::get("/animals", [AnimalController::class, 'index']);

 # Method POST

 Route::post("/animals", [AnimalController::class, 'store']);

 #method PUT
 Route::put("/animals/{id}", [AnimalController::class, 'update']);

 #method DELETE
 Route::delete("/animals", [AnimalController::class, 'destroy']);

//  Route Student 
Route::get('/students', [StudentsController::class, 'index']);
Route::post('/students', [StudentsController::class, 'store']);


// -----------------