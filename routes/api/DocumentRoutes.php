<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Middleware\ValidateApiKey;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware(ValidateApiKey::class)->group(function () {
    // Ruta protegida de ejemplo
    Route::get('/documents/documentsbycasesid', [DocumentController::class, 'getDocumentsByCasesId']);
    Route::get('/documents/download', [DocumentController::class, 'downloadDocumentByPath']);
});
/*
Route::get('/documents/documentsbycasesid', [DocumentController::class, 'getDocumentsByCasesId']);
Route::get('/documents/download', [DocumentController::class, 'downloadDocumentByPath']);*/
