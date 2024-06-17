<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\UserHasCourse;
use Illuminate\Support\Facades\Auth;

class instructorController extends Controller
{
    public function AllCourses(){
        // return view('instructor.home');
        //  $courses = Course::where('is_active',true)->get();
         $courses = UserHasCourse::where('user_id',Auth::id())
         ->with('course')
         ->get();
        //  return $courses;
         return view('instructor.home',compact('courses'));
    }
    public function profile(){
        $profile = Auth::user();
        // return $profile;
        return  view('instructor.profile',compact('profile'));
    }
    public function ShowCourse($id){
        $course = Course::where('is_active',true)
        ->where('id',$id)
        ->with('lectures')
        ->get()->first();

        if (!$course) {
            abort(404);
        }
        return view ('instructor.ShowCourse',compact('course'));
    }
    public function upload(Request $request)
    {
        // $file = $request->file('pdf');
        // $fileName = $file->getClientOriginalName();
        // $filePath = $file->storeAs('pdfs', $fileName);

        // $pdf = new File();
        // $pdf->name = $fileName;
        // $pdf->path = $filePath;
        // $pdf->save();

        // return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    public function AddGrade (){
        $users=User::all();
        $courses= Course::all();
        return  view('instructor.update_grade',compact('users','courses'));
    }
    public function storeGrade (Request $request)
    {
         // Validate the request
         $data = $request->validate([
            // 'course_id' => 'required|exists:courses,id',
            // 'user_id' => 'required|exists:users,id',
            'grade' => 'required|min:0|max:100',
        ]);

        // Store the grade
        UserHasCourse::updateOrCreate(
            // ['course_id' => $data['course_id'],
            // 'user_id' => $data['user_id']],
            ['grade' => $data['grade']]
        );

        return redirect()->route('create-grade')->with('success', 'Grade added successfully.');
        }

}
