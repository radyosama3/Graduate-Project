@extends('structure')

@section('pageName')
| exam
@endsection

@section('meta')
    {{-- // --}}
@endsection

@section('header')
    {{-- // --}}
@endsection

@section('footer')
    {{-- // --}}
@endsection

@section('main.style')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/exam.css') }}">

@endsection

@section('main.script')
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/courses.js') }}"></script>

@endsection

@section('content')

    <div class="header d-flex justify-content-end ">

        <h4 class="p-3"> <a href="{{ route('request.logout') }}" class="btn btn-logout">Logout</a></h4>
        <h4 class="p-3">{{ $auth->name }}</h4>
        <div class="icon">
                <img src="../img/Ellipse 2.png" alt>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="navbar pt-5  ps-5">
            <a class="navbar-brand d-flex align-items-center" >
                <img width="140" src="../img/Modern.png" alt="">
                <h2 class="ms-3 mb-0">Modern Academy</h2>
            </a>

            <div class="collapse navbar-collapse  ps-5" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="{{ route('courses-page') }}">Courses</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="{{ route('grads-page') }}">Grades</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="{{ route('profile-page') }}">Profile</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="{{ route('about-page') }}">About Us</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="{{ route('contact-page') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




<div class="container">
        <h1>Exam </h1>
        <form action="" method="POST">

            <div class="question">
                @foreach ($questions as $question )
                <br>
                <label for="q1">1.{{$question->question_text}}?</label>
                <input type="text" id="q1" name="q1" required>
                <br>
                @endforeach
            </div>
            <div class="form-group">
                <button type="submit">Submit Exam</button>
            </div>
        </form>
    </div>
    {{-- <x-footer-component /> --}}
@endsection
