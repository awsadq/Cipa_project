<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\CourseAdminController;
use App\Http\Controllers\Admin\CertifiedUserController;

// 🔹 Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🔹 Курсы
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index'); // показывает только 4 курса на главной
Route::get('/courses/all', [CourseController::class, 'allCourses'])->name('courses.allcourses'); // отдельная страница со всеми курсами
Route::get('/courses/schedule', [CourseController::class, 'schedule'])->name('courses.full_schedule');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// 🔹 Новости
Route::get('/news', [NewsController::class, 'allNews'])->name('news.allnews');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// 🔹 Поиск
Route::get('/search', [SearchController::class, 'index'])->name('search');

// 🔹 Временный маршрут (если используется)
Route::get('/pages/home', [HomeController::class, 'index'])->name('components.home_news');

Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

use App\Http\Controllers\SubscriptionController;

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');



// 🔹 Админка
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', CourseAdminController::class);
    Route::resource('news', NewsController::class);

    Route::get('certified-users', [CertifiedUserController::class, 'index'])->name('certified.index');
    Route::get('certified-users/{user}/edit', [CertifiedUserController::class, 'edit'])->name('certified.edit');
    Route::put('certified-users/{user}', [CertifiedUserController::class, 'update'])->name('certified.update');
    Route::delete('certified-users/{user}', [CertifiedUserController::class, 'destroy'])->name('certified.destroy');
});
