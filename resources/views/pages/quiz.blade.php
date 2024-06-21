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
                <img width="140" src="../img/Modern.png " alt="">
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
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Exam</h1>

        @if($questions->isEmpty() || $questions->first()->course_id == null)
            <p>No questions are available for this exam.</p>
        @else
            <form action="{{ route('submitExam') }}" method="POST">
                @csrf <!-- CSRF token for security -->

                <input type="hidden" name="course_id" value="{{ $questions->first()->course_id }}">

                <div class="question">
                    @foreach ($questions as $question)
                        <br>
                        <label for="q{{ $question->id }}">{{ $loop->iteration }}. {{ $question->question_text }}?</label>
                        <input type="text" id="q{{ $question->id }}" name="answers[{{ $question->id }}]" required>
                        <br>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit">Submit Exam</button>
                </div>
            </form>
        @endif
    </div>


    {{-- <x-footer-component /> --}}
@endsection
