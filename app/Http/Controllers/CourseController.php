<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserHasCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function submitExam(Request $request)
    {
        $user_id = auth()->id(); // Assuming the user is authenticated
        $course_id = $request->input('course_id');

        $question_ids = question::where('course_id', $course_id)->pluck('id');

        $existingAnswers = Answer::whereIn('question_id', $question_ids)
                                  ->where('user_id', $user_id)
                                  ->exists();

        if ($existingAnswers) {
            return redirect()->back()->with('error', 'You have already submitted this quiz.');
        }

        $answers = $request->input('answers');

        foreach ($answers as $question_id => $answer_text) {
            Answer::create([
                'answer_text' => $answer_text,
                'question_id' => $question_id,
                'user_id' => $user_id,
            ]);
        }

        return redirect()->route('courses-page')->with('success', 'Exam submitted successfully!');
    }


    }
