<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserTableController;
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

Route::resource('/courseuser',CourseUserTableController::class);

//AJAX RESPONSE
Route::post('/retrieveSuggestion', [UserController::class, 'retrieveSuggestion'])->name('RetrieveSuggestion');
