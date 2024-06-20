<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function adduser()
    {
        $types = User::pluck('type')->unique();
        return view('admin.adduser',compact('types'));
    }
    //store user
    public function store(Request $request)
{
    $data = $request->validate([
        'id' => 'nullable|numeric|unique:users,id',
        'user_id' => 'required|unique:users,user_id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
        'type' => ['required', Rule::in(['student', 'instructor', 'admin'])],
        'class_room' => 'nullable|string|max:2',
        'level' => 'nullable|string|max:1',
        'number' => 'nullable|string|max:15',
        'password' => 'required|string|min:8|max:25|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = Storage::putFile('userImage', $data['image']);
        if ($path) {
            $data['image'] = $path;
        } else {
            dd('Failed to store image');
        }
    }
    $data['password'] = bcrypt($data['password']);
    // return response()->json($data);
    $user = User::create($data);

    return redirect()->back()->with('success', 'User added successfully.');
    }
    //redirect to edit form
    public function editusers( $id){
            $users = User::all();
            $user= User::findOrFail( $id);
            return view('admin.edituser',compact('user','users'));
    }
    public function updateuser(Request $request, $id)
    {
        $user= User::findOrFail($id);
        $data = $request->validate([
            'user_id' => [
                'required',
                Rule::unique('users', 'user_id')->ignore($user->id)
            ],
        //   'user_id' => 'required|unique:users,user_id',
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'type' => ['required', Rule::in(['student', 'instructor', 'admin'])],
            'class_room' => 'nullable|string|max:2',
            'level' => 'nullable|string|max:1',
            'number' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|max:25|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->has("image")) {
            if($user->image!=null){
                Storage::delete($user->image);
            }
                $data['image'] = Storage::putFile('userImage', $data['image']);
            }
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Remove the password from the $data array if it's not set
        }
        $user->update($data);
        return redirect(route('allusers'))->with('success', 'User updated successfully.');
    }
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        // Storage::delete($user->image);
        $user->delete();

        $users = User::all();

        return redirect()->route('allusers')->with('success', 'user deleted successfully!');
    }
    //show all user
    public function showall(){
        $users = User::all();
        return view('admin.alluser',compact('users'));
    }
    //redirect to add course page
    public function addcourse(){
        $courses = Course::all();
        return view('admin.addcourse',compact('courses'));
    }
    public function storeCourse(Request $request)
    {
        $data = $request->validate([
            'id' => 'nullable|integer|unique:courses',
            'course_id' => 'required|unique:courses,course_id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('courseicon');
        }

        Course::create($data);

        return redirect()->route('addcourse')->with('success', 'Course added successfully.');
    }

    public function allcourses(){
        $courses= Course::all();
        return view('admin.allcourses',compact('courses'));
    }

    public function editcourse($id){
    $course= Course::findOrFail($id);
    return view('admin.editcourse',compact('course'));
    }
    public function deletecourse($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            return redirect()->route('allcourses')->with('success', 'Course deleted successfully!');
        } else {
            return redirect()->route('allcourses')->with('error', 'Course not found.');
        }
    }
    public function updatecourse(Request $request, $id)
        {
            $course= Course::findOrFail($id);
            $data=$request->validate([
                'id' => 'nullable|integer|unique:courses,id,' . $course->id,
            'course_id' => [
                    'required',
                    Rule::unique('courses', 'course_id')->ignore($course->id)],
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'is_active' => 'required|boolean',
            ]);

            if ($request->hasFile('icon')) {
                if($course->icon)
                { Storage::delete($course->icon);}
                $data['icon'] = $request->file('icon')->store('courseicon');
            }

            // if ($request->has("icon")) {
            //     if($course->icon)
            //     { Storage::delete($course->icon);}
            //     $data['image'] = Storage::putFile('courseicon', $data['icon']);
            // }

            $course->update($data);
            return redirect(route('allcourses'))->with('success', 'course updated successfully.');
    }
    public function showAssignCourseForm()
    {
        $users = User::all();
        $courses = Course::all();
        return view('admin.assigncourse', compact('users', 'courses'));
    }
    public function assignCourse(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'nullable|string',
        ]);

        $user = User::find($request->user_id);
        if ($user) {
            // Check if the user already has the course assigned
            if ($user->courses->contains($request->course_id)) {

                return redirect()->back()->with('error', 'the User already enrolled in this course.');

            }
            // Attach the course with the grade to the user
            $user->courses()->attach($request->course_id, ['grade' => $request->grade]);

            return redirect()->back()->with('success', ' the Course assigned successfully!');
        } else {
            return redirect()->back()->with('error', ' the User not found.');
        }
    }
    public function addlec(){
        $courses= Course::all();
        return view('admin.addLec',compact('courses'));
    }
    public function uploadlec(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'course_id' => 'required|exists:courses,id',
        'is_active' => 'required|boolean',
        'media.*' => 'nullable|file|mimes:pdf,ppt,pptx|max:20480', // 20MB Max for each file
    ]);

    $course = Course::find($request->course_id);
    $courseFolder = Str::slug($course->name);

    $lecture = new Lecture;
    $lecture->course_id = $request->course_id;
    $lecture->title = $request->title;
    $lecture->description = $request->description;
    $lecture->is_active = $request->is_active;

    // Handle file uploads if any
    if ($request->hasFile('media')) {
        // Delete old media files
        

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

    $lecture->save();

    return redirect()->route('instructor-ShowCourse', $course->id)->with('success', 'Lecture uploaded successfully!');
}

    }