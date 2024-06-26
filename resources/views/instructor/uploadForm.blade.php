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
        <form action="{{ route('updatelec', $Lecture->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Lecture Title:</label>
                <input type="text" id="title" value="{{ $Lecture->title }}" name="title" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required>{{ $Lecture->description }}</textarea>
            </div>

            <div>
                <label for="file">Attach File:</label>
                <input type="file" id="media" name="media[]" accept="image/*,.pdf,.ppt,.pptx" multiple>
            </div>
            <br>

            <div class="form-group">
                <label for="active">Is Active</label>
                <select id="is_active" name="is_active" class="form-control">
                    <option value="0"{{ old('is_active', $Lecture->is_active) == '0' ? ' selected' : '' }}>Not Active</option>
                    <option value="1"{{ old('is_active', $Lecture->is_active) == '1' ? ' selected' : '' }}>Active</option>
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