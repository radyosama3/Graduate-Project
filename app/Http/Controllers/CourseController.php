<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\UserHasCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = Course::where('is_active',true)->get();
        $courses = UserHasCourse::where('user_id',Auth::id())
        ->with('course')
        ->get();
        // return $courses;
        return view('pages.courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::where('is_active',true)
        ->where('id',$id)
        ->with('lectures')
        ->get()->first();

        if (!$course) {
            abort(404);
        }

        // return $course;
        return view('pages.course-show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
