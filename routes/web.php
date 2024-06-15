<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\instructorController;
use App\Models\Course;
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


// Route::get('assincourse', function () {

// return view('admin.assigncourse');})->name('assincourse');

Route::get('addlec', function () {
   $courses= Course::all();
    return view('admin.addLec',compact('courses'));})->name('addlec');

Route::controller(AdminController::class)->group(function(){

    Route::get('adduser','adduser')->name('adduser');
    Route::post('addusers','store')->name('store') ;

    // Route::get('alluser','alluser')->name('alluser');
    Route::get('showall','showall')->name('allusers');
    Route::get('users/edit/{id}','editusers')->name('edituser');
    Route::put('user/update/{id}','updateuser')->name('updateuser');

    Route::delete('deleteuser/{id}','deleteuser')->name('deleteuser');
    Route::get('addcourse', 'addcourse')->name('addcourse');


    Route::get('allcourses','allcourses')->name('allcourses');
    Route::post('addcourses','storecourse')->name('storecourse') ;
    Route::get('course/edit/{id}','editcourse')->name('editcourse');
    Route::put('course/update/{id}','updatecourse')->name('updatecourse');

    Route::delete('deletecourse/{id}','deletecourse')->name('deletecourse');

    Route::get('assincourse','showAssignCourseForm')->name('assincourse');
    Route::post('assignCourse','assignCourse')->name('storeassignCourse');


});


//group  of route instructor
// Route::middleware(['auth','is_instructor)->group(function () {
//     Route::get('/profile', [AuthController::class,'profile'])->name('profile-page');
//     Route::get('/about', function () {return view('pages.about');})->name('about-page');
//     Route::get('/contact', function () {return view('pages.contact');})->name('contact-page');
//     Route::get('/instructor/courses', [CourseController::class,'index'])->name('courses-page');
//     Route::get('/course/{id}', [CourseController::class,'show'])->name('course-show-page');
//     Route::get('/grads', [GradeController::class,'index'])->name('grads-page');
// });