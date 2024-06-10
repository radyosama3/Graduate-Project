@extends('admin.layout')
@section('body')


{{-- add course  --}}
<div class="main-content" id="addCourse">
    @include('errors')
    @include('success')
    <br>
    <h2>Add Course</h2>
        <br>
            <br>
            <form action="{{ route('storecourse') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="course_id">Course Id</label>
                        <input type="text" id="course_id" name="course_id" placeholder="Enter course Id">
                    </div>

                    <div class="form-group">
                        <label for="courseName">Course Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter course name">
                    </div>

                    <div class="form-group">
                        <label for="courseDescription">Course Description</label>
                        <input type="text" id="description" name="description" placeholder="Enter course description">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" id="icon" name="icon" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="active">Is Active</label>
                        <select id="is_active" name="is_active">
                            <!-- Options would be populated dynamically -->
                            <option value="1">active</option>
                            <option value="0">not active</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">Add Course</button>
                    </div>

                </form>

</div>
@endsection