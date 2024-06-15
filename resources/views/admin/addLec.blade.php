@extends('admin.layout')
@section('body')
{{-- add lecture  --}}
<div class="main-content" id="addLecture">
<h2>Add Lecture</h2>
    <br>
        <br>
        {{-- {{ route('upload.lecture') }} --}}

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="lectureTitle">Lecture Title</label>
                <input type="text" id="title" name="title" placeholder="Enter lecture title">
            </div>
            <div class="form-group">
                <label for="lectureContent">Lecture description</label>
                <input type="text" id="description" name="description" placeholder="Enter lecture description">
            </div>

            <div class="form-group">
                <label for="lectureCourse">Assign to Course</label>
                <select id="lectureCourse" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="active">Is Active</label>
                <select id="is_active" name="is_active">
                    <option value="1">active</option>
                    <option value="0">not active</option>
                </select>
            </div>

            <div class="form-group">
                <label for="file_upload">File Upload</label>
                <input type="file" id="media" name="media[]" accept="image/*,.pdf,.ppt,.pptx" multiple>
            </div>

            <div class="form-group">
                <button type="submit">Add Lecture</button>
            </div>
        </form>

</div>
@endsection