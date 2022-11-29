<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // Route::prefix('projects')->middleware('auth')->group(function () {
    //     Route::get('/list', [ProjectController::class, 'list']);
    //     Route::get('/{id}', [ProjectController::class, 'view']);
    //     Route::post('/create', [ProjectController::class, 'create']);
    //     Route::post('/edit/{id}', [ProjectController::class, 'edit']);
    //     Route::delete('/delete/{id}', [ProjectController::class, 'delete']);
    // });

    Route::get('/home', [PublicController::class, 'home']);
    Route::post('/upload', [ImageController::class, 'upload']);
});