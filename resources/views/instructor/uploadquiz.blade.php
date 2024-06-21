@extends('structure')

@section('pageName')
| upload quiz
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
    {{-- <link rel="stylesheet" href="{{ asset('instructor/css/assignment.css') }}"> --}}

@endsection

@section('main.script')
<script src="{{asset('js/assignment.js')}}"></script>
@endsection

@section('content')
    <x-navbar-component />

   <div class='container' style="max-width: 800px; margin: 0 auto; background: linear-gradient(90.27deg, #71c5cb 17.72%, #74cacf 31.05%, #9eeae6 53.49%, #6efce5 86%); padding: 20px; border-radius: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

    <h2 style="text-align: center; margin-bottom: 20px; color: #000000;">Doctor's Questionnaire Generator</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="questionnaire-container">
        <div class="category">
            <h3>General Health</h3>

            <form action="{{ route('storequiz', ['course_id' => $course->id]) }}" method="POST">
                @csrf
                @foreach ($questions as $question)
                    <div class="question" style="margin-bottom: 10px;">
                        <input type="checkbox" name="questions[]" value="{{ $question }}"> {{ $question }}
                    </div>
                @endforeach

                <button type="submit" style="display: block; margin: 20px auto; padding: 10px 20px; background: linear-gradient(90.27deg, #173436 17.72%, #070e0f 31.05%, #192e2d 53.49%, #2e6a60 86%); color: #fff; border: none; border-radius: 5px; cursor: pointer;">Store Selected Questions</button>
            </form>
        </div>

        <div class="selected-questions" id="selected-questions"></div>
    </div>
</div>





@endsection
