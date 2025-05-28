<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

// Аутентификация
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Защищённые маршруты
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [ProfileController::class, 'me']);
    Route::put('/me', [ProfileController::class, 'update']);
    Route::get('/me/payments', [PaymentController::class, 'index']);
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::put('/change-password', [AuthController::class, 'changePassword'])->middleware('auth:sanctum');
Route::post('/me/avatar', [ProfileController::class, 'uploadAvatar'])->middleware('auth:sanctum');

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
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // admin routes
});
Route::middleware('auth:sanctum')->post('/certificates', [CertificateController::class, 'store']);

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

