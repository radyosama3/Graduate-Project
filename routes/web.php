<?php
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\instructorController;
use App\Models\Lecture;
use App\Models\question;
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
    Route::post('/submit-exam', [CourseController::class, 'submitExam'])->name('submitExam');

    Route::get('/course/{course}/quiz', function ($courseId) {
        $course = Course::findOrFail($courseId);
        $auth=$this->auth = Auth::user();
        $questions = Question::where('course_id', $courseId)->get();

        return view('pages.quiz',compact('questions','auth'));
    })->name('quiz.redirect');
});

Route::middleware(['auth', 'IsInstructor'])->group(function () {
    Route::controller(instructorController::class)->group(function(){
        Route::get('instructor/courses', 'AllCourses')->name('instructor-courses-page');
        Route::get('instructor/profile', 'profile')->name('instructor-profile-page');
        Route::get('instructor/course/{id}','ShowCourse')->name('instructor-ShowCourse');

        Route::get('grade','AddGrade')->name('instructor_grade');
        Route::post('/store-grade', 'updategrade')->name('store-grade');

        Route::delete('deletelec/{id}','deletelec')->name('deletelec');

        Route::get('/lecture_edit/{id}','lecture_edit')->name('instrutor_addlec');
        Route::get('lecture_uploaded/{id}','lecture_uploaded')->name('instrutor_addlecture');
        Route::put('/updatelec/{id}','updatelec')->name('updatelec');

        Route::get('uploadquiz/{course_id}','uploadquiz')->name('uploadquiz');
        Route::post('storequiz/{course_id}', 'storequiz' )->name('storequiz');
    });
});
Route::controller(AdminController::class)->group(function(){
    Route::post('uploadlec','uploadlec')->name('uploadlec');

        Route::middleware(['auth', 'IsAdmin'])->group(function () {
        Route::get('adduser','adduser')->name('adduser');
        Route::post('addusers','store')->name('store') ;

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

        Route::get('addlec','addlec')->name('addlec');

    });
});

