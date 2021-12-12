<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCaseController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\CaseLogController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

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
    Route::post('change-password', [AuthController::class, 'changePassword']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('projects', ProjectController::class);

    Route::put('account', [AccountController::class, 'update']);

    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);

    Route::prefix('projects/{project}')->group(function () {
        Route::get('cases', [ProjectCaseController::class, 'index']);
        Route::post('cases', [ProjectCaseController::class, 'store']);

        Route::get('environments', [EnvironmentController::class, 'index']);
        Route::post('environments', [EnvironmentController::class, 'store']);
    });

    Route::prefix('environments/{environment}')->group(function () {
        Route::get('', [EnvironmentController::class, 'show']);
        Route::put('', [EnvironmentController::class, 'update']);
        Route::delete('', [EnvironmentController::class, 'destroy']);
    });

    Route::prefix('cases/{projectCase}')->group(function () {
        Route::get('/', [ProjectCaseController::class, 'show']);
        Route::put('/', [ProjectCaseController::class, 'update']);
        Route::delete('/', [ProjectCaseController::class, 'destroy']);

        Route::get('/steps', [StepController::class, 'index']);
        Route::post('/steps', [StepController::class, 'store']);

        Route::get('/case-logs', [CaseLogController::class, 'index']);
        Route::post('/case-logs', [CaseLogController::class, 'store']);
    });

    Route::prefix('steps/{step}')->group(function () {
        Route::get('/', [StepController::class, 'show']);
        Route::put('/', [StepController::class, 'update']);
        Route::delete('/', [StepController::class, 'destroy']);

        Route::get('change-order', [StepController::class, 'changeOrder']);
    });

    Route::get('case-logs/{caseLog}', [CaseLogController::class, 'show']);
});
