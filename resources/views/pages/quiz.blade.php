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
<x-navbar-component />
<div class="container">
        <h1>Exam </h1>
        <form action="/submit-exam" method="POST">
            <div class="question">
                <label for="q1">1. What is the capital of France?</label>
                <input type="text" id="q1" name="q1" required>
            </div>
            <div class="question">
                <label for="q2">2. Solve: 5 + 7 = ?</label>
                <input type="text" id="q2" name="q2" required>
            </div>
            <div class="question">
                <label for="q3">3. What is the chemical symbol for water?</label>
                <input type="text" id="q3" name="q3" required>
            </div>
            <div class="question">
                <label for="q4">3. What is the chemical symbol for water?</label>
                <input type="text" id="q4" name="q4" required>
            </div>
            <div class="question">
                <label for="q5">3. What is the chemical symbol for water?</label>
                <input type="text" id="q5" name="q5" required>
            </div>

            <div class="form-group">
                <button type="submit">Submit Exam</button>
            </div>
        </form>
    </div>
    {{-- <x-footer-component /> --}}
@endsection
