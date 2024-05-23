<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\UserHasCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public  function redirecto(){
        if (Auth::user()->type=="admin"){
            return view('admin.home');
        }
        else if (Auth::user()->type=="student"){
            $courses = UserHasCourse::where('user_id',Auth::id())
            ->with('course')
            ->get();

            // return response()->json($courses,200);
            return view('pages.courses',compact('courses'));
            // return redirect()->route('courses-page',compact('courses'));
        }
        else {
            $courses = UserHasCourse::where('user_id',Auth::id())
            ->with('course')
            ->get();

            return redirect(route('instructor-courses-page',compact('courses')));
            // return redirect()->route('courses-page',compact('courses'));        }

   }
}
}