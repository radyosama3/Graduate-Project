@extends('structure')
@section('main.style')
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('instructor/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('instructor/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('instructor/css/doctor.css')}}">
@endsection

@section('pageName')
|uploade lecture
@endsection
@section('content')
    <x-navbar-component />

    <div class="container">
        @include('errors')
        @include('success')
        <h2>UpLoad Lecture </h2>
        <form action="{{ route('uploadlec') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Lecture Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div>
                <label for="file">Attach File:</label>
                <input type="file" id="media" name="media[]" accept="image/*,.pdf,.ppt,.pptx" multiple>
            </div>
            <br>
            <div class="form-group">
                <label for="active">Is Active</label>
                <select id="is_active" name="is_active">
                    <option value="1">active</option>
                    <option value="0">not active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lectureCourse">Assign to Course</label>
                <select id="lectureCourse" name="course_id">
                    @foreach($courses as $course)
                    @if($course->id == $Lecture->course_id)
                        <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>

            <input type="submit" value="Upload Assignment">
        </form>




    </div>
@endsection