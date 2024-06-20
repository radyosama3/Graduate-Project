<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserHasCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function AddGrade (){
        $users = User::where('type', 'student')->get();
        $courses= Course::all();
        return  view('instructor.update_grade',compact('users','courses'));
    }
    public function updategrade (Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'grade' => 'required|numeric|min:0|max:100',
        ]);

        // Check if the user is enrolled in the specified course
        $user = User::find($request->user_id);
        if (!$user->courses->contains($request->course_id)) {
            return redirect()->back()->with('error', 'Student is not assigned to this course.');
        }

        // Find the grade entry for the specified user and course
        $grade = UserHasCourse::where('course_id', $request->course_id)
                        ->where('user_id', $request->user_id)
                        ->first();

        // If the grade entry exists, update it. Otherwise, return an error response.
        if ($grade) {
            $grade->grade = $request->grade;
            $grade->save();
            return redirect()->back()->with('success', 'Grade has been updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Grade entry does not exist.');
        }
    }
    public function deletelec($id)
    {
    $lecture = Lecture::find($id);
    if ($lecture) {
        // Check if the lecture has an associated media file
        if (!empty($lecture->media) && file_exists(public_path($lecture->media))) {
            unlink(public_path($lecture->media));
        }
        $lecture->delete();
        return redirect()->back()->with('success', 'Lecture deleted successfully!');
    } else {
        return redirect()->back()->with('error', 'Lecture not found.');
    }
    }

    public function lecture_edit($id){
        $Lecture=Lecture::findOrFail($id);
        $courses= Course::all();
    return view('instructor.uploadForm',compact('courses','Lecture'));
    }
    public function lecture_uploaded($id){
        $courses= Course::all();
        $Lecture=Lecture::findOrFail($id);
        return view('instructor.uploadlec',compact('courses','Lecture'));
    }
    public function updatelec(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
            'is_active' => 'required|boolean',
            'media.*' => 'nullable|file|mimes:pdf,ppt,pptx|max:20480', // 20MB Max for each file
        ]);

        $lecture = Lecture::findOrFail($id);

        $course = Course::find($request->course_id);
        $courseFolder = Str::slug($course->name);

        // Update lecture details
        $lecture->course_id = $request->input('course_id');
        $lecture->title = $request->input('title');
        $lecture->description = $request->input('description');
        $lecture->is_active = $request->input('is_active');

        // Handle file uploads if any
        if ($request->hasFile('media')) {
            // Delete old media files
            if ($lecture->media) {
                $oldMediaPaths = json_decode($lecture->media, true);
                foreach ($oldMediaPaths as $oldPath) {
                    Storage::delete($oldPath);
                }
            }

            $files = $request->file('media');
            $mediaPaths = [];

            foreach ($files as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . $originalName . '.' . $extension;

                // Check if directory exists and create if not
                $directory = "public/{$courseFolder}";
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                $path = $file->storeAs($directory, $filename);
                $mediaPaths[] = $path; // Store the path in the database
            }

            $lecture->media = json_encode($mediaPaths); // Store all paths as JSON
        }

        // Save the updated lecture
        $lecture->save();

        return redirect()->route('instructor-ShowCourse',$course->id)->with('success', 'Lecture updated successfully!');
    }
}
