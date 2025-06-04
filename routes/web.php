<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/courses/{course}', [\App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');

use App\Http\Controllers\Admin\NewsController;

Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/schedule', [CourseController::class, 'schedule'])->name('courses.full_schedule');

Route::get('/news', [NewsController::class, 'allNews'])->name('news.allnews');

use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/pages/home', [HomeController::class, 'index'])->name('components.home_news');





// routes/web.php
use App\Http\Controllers\Admin\CourseAdminController;
use App\Http\Controllers\Admin\CertifiedUserController;

    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', CourseAdminController::class);
    Route::resource('news', NewsController::class);
    Route::get('certified-users', [CertifiedUserController::class, 'index'])->name('certified.index');
    Route::get('certified-users/{user}/edit', [CertifiedUserController::class, 'edit'])->name('certified.edit');
    Route::put('certified-users/{user}', [CertifiedUserController::class, 'update'])->name('certified.update');
    Route::delete('certified-users/{user}', [CertifiedUserController::class, 'destroy'])->name('certified.destroy');

});
