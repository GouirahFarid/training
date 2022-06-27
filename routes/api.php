<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('formations')->group(function (){
    Route::post('',[\App\Http\Controllers\FormationController::class,'create']);
    Route::put('/{formationId}',[\App\Http\Controllers\FormationController::class,'update']);
    Route::delete('/{formationId}',[\App\Http\Controllers\FormationController::class,'delete']);
    Route::get('/{formationId}',[\App\Http\Controllers\FormationController::class,'get']);
    Route::get('',[\App\Http\Controllers\FormationController::class,'all']);
});
Route::prefix('etudiants')->group(function (){
    Route::post('',[\App\Http\Controllers\EtudiantController::class,'create']);
    Route::put('/{etudiantId}',[\App\Http\Controllers\EtudiantController::class,'update']);
    Route::delete('/{etudiantId}',[\App\Http\Controllers\EtudiantController::class,'delete']);
    Route::get('/{etudiantId}',[\App\Http\Controllers\EtudiantController::class,'get']);
    Route::get('',[\App\Http\Controllers\EtudiantController::class,'all']);
});
