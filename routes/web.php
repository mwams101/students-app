<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
// Authentication and Registration
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard
//Route::get('/home', [AuthController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/home', [AuthController::class, 'home'])->name('home');
    //Courses
    Route::resource('courses', CourseController::class);
    //Courses
    Route::resource('students', StudentController::class);

});
