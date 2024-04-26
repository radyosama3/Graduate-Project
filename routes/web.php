<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
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

Route::get('/', function () {return redirect()->route('profile-page');})->name('welcome-page');
Route::get('/login', [AuthController::class,'viewLogin'])->middleware('guest')->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('request.login');
Route::get('/register', function () {return view('pages.register');})->name('register-page');
Route::post('auth/register', [AuthController::class, 'register'])->name('request.register');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('request.logout');
    Route::get('/profile', [AuthController::class,'profile'])->name('profile-page');
    Route::get('/about', function () {return view('pages.about');})->name('about-page');
    Route::get('/contact', function () {return view('pages.contact');})->name('contact-page');
    Route::get('/courses', [CourseController::class,'index'])->name('courses-page');
    Route::get('/course/{id}', [CourseController::class,'show'])->name('course-show-page');
    Route::get('/grads', [GradeController::class,'index'])->name('grads-page');
});