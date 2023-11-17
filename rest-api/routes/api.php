<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SortController;

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

//Animal
Route::get("/animals",[AnimalController::class, "index"]);

Route::post('/animals',[AnimalController::class,"store"]);

Route::put('/animals/{id}',[AnimalController::class,"update"]);

Route::delete('/animals/{id}',[AnimalController::class,"destroy"]);

//Student
// Route::get("/students",[StudentController::class,"index"])->middleware("auth:sanctum");
Route::get("/students",[StudentController::class,"index"]);

Route::post("/students",[StudentController::class,"store"])->middleware("auth:sanctum");

Route::put("/students/{id}",[StudentController::class,"update"])->middleware("auth:sanctum");

Route::delete("/students/{id}",[StudentController::class,"destroy"])->middleware("auth:sanctum");

Route::get("/students/{id}",[StudentController::class,"indexDetail"])->middleware("auth:sanctum");

Route::post("/register",[AuthController::class,"register"]);

Route::post("/login",[AuthController::class,"login"]);

// Route::get("/students/?sort",[StudentController::class,"sort"]);

// Route::get("/students/?",[StudentController::class,"filter"]);