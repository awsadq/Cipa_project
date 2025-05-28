<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistryController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\MembershipController;

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
