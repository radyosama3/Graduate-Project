@extends('admin.layout')
@section('body')

{{-- add course  --}}
<div class="main-content" id="addCourse">
    <h2>Add Course</h2>
        <br>
            <br>
                <form>
                    <div class="form-group">
                        <label for="course_id">Course Id</label>
                        <input type="text" id="course_id" name="course_id" placeholder="Enter course Id">
                    </div>

                    <div class="form-group">
                        <label for="courseName">Course Name</label>
                        <input type="text" id="courseName" name="courseName" placeholder="Enter course name">
                    </div>

                    <div class="form-group">
                        <label for="courseDescription">Course Description</label>
                        <input type="text" id="courseDescription" name="courseDescription" placeholder="Enter course description">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" id="icon" name="icon" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="active">Is Active</label>
                        <select id="active" name="active">
                            <!-- Options would be populated dynamically -->
                            <option value="1">active</option>
                            <option value="2">not active</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">Add Course</button>
                    </div>

                </form>
</div>
@endsection