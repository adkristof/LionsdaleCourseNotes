<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserTableController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/courses',CourseController::class);
Route::get('/courses_deleted', [CourseController::class, 'show_deleted'])->name('courses.show_deleted');
Route::put('/courses/restore/{course}', [CourseController::class, 'restore'])->name('courses.restore')->withTrashed();
Route::get('/mycourses', [CourseController::class, 'myindex'])->name('courses.mycourses');
Route::get('/quiz/{course}', [CourseUserTableController::class,'quiz'])->name('courses.quiz');

Route::resource('/courseuser',CourseUserTableController::class);

Route::resource('/schools',SchoolController::class);
Route::get('/schools_deleted', [SchoolController::class, 'show_deleted'])->name('schools.show_deleted');
Route::get('/schools', [SchoolController::class, 'index'])->name('schools.index');
Route::put('/schools/restore/{school}', [SchoolController::class, 'restore'])->name('schools.restore')->withTrashed();

//AJAX RESPONSE
Route::post('/retrieveSuggestion', [UserController::class, 'retrieveSuggestion'])->name('RetrieveSuggestion');
