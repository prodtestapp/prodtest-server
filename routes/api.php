<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCaseController;
use App\Http\Controllers\StepController;

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

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth'
], function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('projects', ProjectController::class);

    Route::prefix('projects/{project}')->group(function () {
        Route::get('cases', [ProjectCaseController::class, 'index']);
        Route::post('cases', [ProjectCaseController::class, 'store']);
    });

    Route::prefix('cases/{projectCase}')->group(function () {
        Route::get('/', [ProjectCaseController::class, 'show']);
        Route::put('/', [ProjectCaseController::class, 'update']);
        Route::delete('/', [ProjectCaseController::class, 'destroy']);

        Route::get('/steps', [StepController::class, 'index']);
        Route::post('/steps', [StepController::class, 'store']);
    });
});
