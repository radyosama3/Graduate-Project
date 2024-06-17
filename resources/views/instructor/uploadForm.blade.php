@extends('structure')
@section('main.style')
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/doctor.css">
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
        <form action="{{route('uploadlec')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">lecture Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div >

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
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Uploud Assignment">
        </form>



    </div>
@endsection