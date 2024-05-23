<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\instructorController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//route of auth
Route::get('/', function () {return redirect()->route('profile-page');})->name('welcome-page');

Route::get('/login', [AuthController::class,'viewLogin'])->middleware('guest')->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('request.login');
Route::get('/register', function () {return view('pages.register');})->name('register-page');
Route::post('auth/register', [AuthController::class, 'register'])->name('request.register');
Route::get('redirecto',[HomeController::class,'redirecto'])->name('redirecto');
Route::get('/logout', [AuthController::class, 'logout'])->name('request.logout');
Route::get('/contact', function () {return view('pages.contact');})->name('contact-page');
Route::get('/about', function () {return view('pages.about');})->name('about-page');

//group  of route student

Route::middleware(['auth','IsStudent'])->group(function () {
    Route::get('/profile', [AuthController::class,'profile'])->name('profile-page');
    Route::get('/courses', [CourseController::class,'index'])->name('courses-page');
    Route::get('/course/{id}', [CourseController::class,'show'])->name('course-show-page');
    Route::get('/grads', [GradeController::class,'index'])->name('grads-page');
});


Route::middleware(['auth', 'IsInstructor'])->group(function () {
    Route::get('instructor/courses', [instructorController::class,'AllCourses'])->name('instructor-courses-page');
    Route::get('instructor/profile', [instructorController::class,'profile'])->name('instructor-profile-page');
    Route::get('instructor/course/{id}', [instructorController::class,'ShowCourse'])->name('instructor-ShowCourse');
});


Route::get('adduser', function (){ return view('admin.adduser');})->name('adduser');
Route::get('addcourse', function (){ return view('admin.addcourse');})->name('addcourse');
Route::get('assincourse', function () {return view('admin.assigncourse');})->name('assincourse');
Route::get('addlec', function () {return view('admin.addLec');})->name('addlec');


//group  of route instructor
// Route::middleware(['auth','is_instructor)->group(function () {
//     Route::get('/profile', [AuthController::class,'profile'])->name('profile-page');
//     Route::get('/about', function () {return view('pages.about');})->name('about-page');
//     Route::get('/contact', function () {return view('pages.contact');})->name('contact-page');
//     Route::get('/instructor/courses', [CourseController::class,'index'])->name('courses-page');
//     Route::get('/course/{id}', [CourseController::class,'show'])->name('course-show-page');
//     Route::get('/grads', [GradeController::class,'index'])->name('grads-page');
// });