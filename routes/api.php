<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/


// Protected routes group
//Route::middleware('auth:sanctum')->group(function () {
    // Include the accounts routes
   
    
//});


require __DIR__ . '/api/DocumentRoutes.php';
