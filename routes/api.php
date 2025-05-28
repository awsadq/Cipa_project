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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ApplicationController;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/trainers', [TrainerController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/courses/{id}/apply', [ApplicationController::class, 'apply']);
});

