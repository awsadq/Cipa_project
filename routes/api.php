<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistryController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\MembershipController;

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
| Все маршруты для API. Здесь — маршруты для 3-го участника:
| - Реестры
| - Сертификации
| - Заявки на членство
|
*/
Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () {
    // Admin routes
});
Route::middleware('auth:sanctum')->post('/certificates', [CertificateController::class, 'store']);

// Получить текущего пользователя (если авторизован)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// =======================
// РЕЕСТРЫ
// =======================

// Получить все записи реестра по типу: ?type=auditor или ?type=organization
Route::get('/registry', [RegistryController::class, 'index']);

// Добавить запись в реестр (в будущем только для админа)
Route::post('/registry', [RegistryController::class, 'store']);


// =======================
// СЕРТИФИКАЦИИ
// =======================

// Получить все сертификаты
Route::get('/certifications', [CertificationController::class, 'index']);

// Найти по номеру сертификата: /certifications/search?number=123456
Route::get('/certifications/search', [CertificationController::class, 'search']);


// =======================
// ЧЛЕНСТВО
// =======================

// Подать заявку на членство (требуется токен)
Route::middleware('auth:sanctum')->post('/membership/apply', [MembershipController::class, 'apply']);

// Получить список всех заявок (например, для админки)
Route::get('/membership', [MembershipController::class, 'index']);

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ApplicationController;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/trainers', [TrainerController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/courses/{id}/apply', [ApplicationController::class, 'apply']);
});

use App\Http\Controllers\AdminController;

Route::middleware('auth:sanctum')->prefix('Admin')->group(function () {
    Route::post('/send-mail', [AdminController::class, 'sendMail']);
    Route::post('/send-whatsapp', [AdminController::class, 'sendWhatsApp']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
});

use App\Models\Subscriber;


Route::post('/subscribe', function (Request $request) {
    $request->validate(['email' => 'required|email|unique:subscribers,email']);
    Subscriber::create(['email' => $request->email]);
    return response()->json(['message' => 'Подписка оформлена']);
});

Route::get('/restricted-section', function () {
    return 'Только для членов';
})->middleware('auth:sanctum', 'check.access:resources');
Route::post('/me/upload-avatar', [ProfileController::class, 'uploadAvatar'])->middleware('auth:sanctum');



