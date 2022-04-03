<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Course_userController ;
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

Route::get('/', function () {
    // return view('layout.navbar');
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/courses',CourseController::class);
Route::resource('/enroll',Course_userController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("/coursesuser",[UserController::class,"getCourses"])->name("user.courses")->middleware("can:isTeacher");
Route::get("/enrollments",[Course_userController ::class,"getEnrollments"])->name("user.enrollments")->middleware("can:isStudent");
Route::get("/availbleCourses",[UserController::class,"getAvCourses"])->middleware("can:isStudent");
Route::get("/enrolling/{id}",[UserController::class,"enrolling"])->middleware("can:isStudent");
Route::get("/unenrolling/{id}",[UserController::class,"unenrolling"])->middleware("can:isStudent");
