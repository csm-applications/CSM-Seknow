<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAccountController;

Route::apiResource("/users","UserAccountController");


Route::get("/users/findbymail/{email}",[UserAccountController::class,'findbymail']);


Route::get("/users/filterbyname/{name}",[UserAccountController::class,'filterbyname']);


Route::get("/users/filterbycompany/{id}",[UserAccountController::class,'filterbycompany']);



/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/