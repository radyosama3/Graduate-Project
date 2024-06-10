@extends('admin.layout')
@section('body')

{{-- add course  --}}
<div class="main-content" id="addCourse">
    @include('errors')
    @include('success')
    <h2>Add Course</h2>
        <br>
            <br>
            <form action="{{ route('updatecourse',$course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="course_id">Course Id</label>
                        <input type="text" id="course_id" value="{{$course->course_id}}" name="course_id" placeholder="Enter course Id">
                    </div>

                    <div class="form-group">
                        <label for="courseName">Course Name</label>
                        <input type="text" id="name" name="name" value="{{$course->name}}" placeholder="Enter course name">
                    </div>

                    <div class="form-group">
                        <label for="courseDescription">Course Description</label>
                        <input type="text" id="description" name="description"  value="{{$course->description}}"placeholder="Enter course description">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" id="icon" name="icon" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="active">Is Active</label>
                        <select id="is_active" name="is_active" class="form-control">
                            <option value="0"{{ (old('is_active', $course->is_active) == '0') ? ' selected' : '' }}>Not Active</option>
                            <option value="1"{{ (old('is_active', $course->is_active) == '1') ? ' selected' : '' }}>Active</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">update Course</button>
                    </div>

                </form>

</div>
@endsection